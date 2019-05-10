package com.example.wiktorpieklik.drinkshop;

import android.app.Activity;
import android.app.AlertDialog;
import android.app.ProgressDialog;
import android.content.DialogInterface;
import android.content.Intent;
import android.net.Uri;
import android.os.Bundle;
import android.support.design.widget.FloatingActionButton;
import android.support.design.widget.Snackbar;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.text.TextUtils;
import android.view.View;
import android.support.design.widget.NavigationView;
import android.support.v4.view.GravityCompat;
import android.support.v4.widget.DrawerLayout;
import android.support.v7.app.ActionBarDrawerToggle;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.view.Menu;
import android.view.MenuItem;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import com.daimajia.slider.library.SliderLayout;
import com.daimajia.slider.library.SliderTypes.BaseSliderView;
import com.daimajia.slider.library.SliderTypes.TextSliderView;
import com.example.wiktorpieklik.drinkshop.Adapters.CategoryAdapter;
import com.example.wiktorpieklik.drinkshop.Database.DataSource.CardRepository;
import com.example.wiktorpieklik.drinkshop.Database.DataSource.FavouriteRepository;
import com.example.wiktorpieklik.drinkshop.Database.Local.RoomDatabaseDrinkShop;
import com.example.wiktorpieklik.drinkshop.Model.Banner;
import com.example.wiktorpieklik.drinkshop.Model.Category;
import com.example.wiktorpieklik.drinkshop.Model.Drink;
import com.example.wiktorpieklik.drinkshop.Retrofit.IDrinkShopAPI;
import com.example.wiktorpieklik.drinkshop.Utils.Common;
import com.example.wiktorpieklik.drinkshop.Utils.ProgressRequestBody;
import com.example.wiktorpieklik.drinkshop.Utils.UploadCallBack;
import com.facebook.accountkit.AccountKit;
import com.ipaulpro.afilechooser.utils.FileUtils;
import com.nex3z.notificationbadge.NotificationBadge;
import com.squareup.picasso.Picasso;

import java.io.File;
import java.util.HashMap;
import java.util.List;

import de.hdodenhof.circleimageview.CircleImageView;
import io.reactivex.android.schedulers.AndroidSchedulers;
import io.reactivex.disposables.CompositeDisposable;
import io.reactivex.functions.Consumer;
import io.reactivex.schedulers.Schedulers;
import okhttp3.MultipartBody;
import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class HomeActivity extends AppCompatActivity
        implements NavigationView.OnNavigationItemSelectedListener, UploadCallBack
{

    private static final int REQUEST_FILE =1002 ;
    private boolean isBackPressed = false;
    TextView txt_name, txt_phone;
    SliderLayout sliderLayout;
    RecyclerView menuRecycler;
    IDrinkShopAPI mService;
    ProgressDialog dialog;

    NotificationBadge badge;
    ImageView card_icon;
    CircleImageView img_avatar;
    Uri selectedFileUri;

    //RxJava
    CompositeDisposable compositeDisposable = new CompositeDisposable();

    @Override
    protected void onCreate(Bundle savedInstanceState)
    {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_home);
        Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);

        mService = Common.getApi();

        menuRecycler = findViewById(R.id.recycler_menu);
        menuRecycler.setLayoutManager(new LinearLayoutManager(this,LinearLayoutManager.HORIZONTAL, false));
        menuRecycler.setHasFixedSize(true);

        sliderLayout = findViewById(R.id.slider);

        FloatingActionButton fab = (FloatingActionButton) findViewById(R.id.fab);
        fab.setOnClickListener(new View.OnClickListener()
        {
            @Override
            public void onClick(View view)
            {
                Snackbar.make(view, "Replace with your own action", Snackbar.LENGTH_LONG)
                        .setAction("Action", null).show();
            }
        });

        DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
        ActionBarDrawerToggle toggle = new ActionBarDrawerToggle(
                this, drawer, toolbar, R.string.navigation_drawer_open, R.string.navigation_drawer_close);
        drawer.addDrawerListener(toggle);
        toggle.syncState();

        NavigationView navigationView = (NavigationView) findViewById(R.id.nav_view);
        navigationView.setNavigationItemSelectedListener(this);


        View headerView = navigationView.getHeaderView(0);
        txt_name = headerView.findViewById(R.id.txt_name);
        txt_phone = headerView.findViewById(R.id.txt_phone);
        img_avatar = headerView.findViewById(R.id.img_avatar);

        img_avatar.setOnClickListener(new View.OnClickListener()
        {
            @Override
            public void onClick(View v)
            {
                chooseImage();
            }
        });

        //set infos
        txt_name.setText(Common.currentUser.getName());
        txt_phone.setText(Common.currentUser.getPhone());

        //set avatar
        if(!TextUtils.isEmpty(Common.currentUser.getAvatarUrl()))
        {
            Picasso.with(this)
                    .load(new StringBuilder(Common.BASE_URL)
                    .append("userAvatar/")
                    .append(Common.currentUser.getAvatarUrl()).toString())
                    .into(img_avatar);
        }

        //get banner
        getBannerImage();

        //get menus
        getMenus();

        //Save newest Topping List
        getToppingList();

        //Init Database
        initDB();
    }

    private void createProgressDialog()
    {
        dialog = new ProgressDialog(this);
        dialog.setTitle("Sending your photo");
        dialog.setIndeterminate(true);
        dialog.setProgressStyle(ProgressDialog.STYLE_HORIZONTAL);
        dialog.show();
    }

    private void chooseImage()
    {
        startActivityForResult(Intent.createChooser(FileUtils.createGetContentIntent(), "Select a photo"), REQUEST_FILE);
    }

    @Override
    protected void onActivityResult(int requestCode, int resultCode, Intent data)
    {
        super.onActivityResult(requestCode, resultCode, data);
        if(resultCode == Activity.RESULT_OK)
        {
            if(requestCode == REQUEST_FILE)
            {
                if(data != null)
                {
                    selectedFileUri = data.getData();
                    if(selectedFileUri != null && !selectedFileUri.getPath().isEmpty())
                    {
                        img_avatar.setImageURI(selectedFileUri);
                        //createProgressDialog();
                        uploadFile();
                    }
                    else
                        Toast.makeText(this, "Cannot upload photo to a server", Toast.LENGTH_SHORT).show();
                }
            }
        }
    }

    private void uploadFile()
    {
        if(selectedFileUri != null)
        {
            File file = FileUtils.getFile(this, selectedFileUri);
            String fileName = new StringBuilder(Common.currentUser.getPhone())
                    .append(FileUtils.getExtension(file.getName()))
                    .toString();

            ProgressRequestBody requestBody = new ProgressRequestBody(file, this);
            final MultipartBody.Part body = MultipartBody.Part.createFormData("uploaded_file", fileName, requestBody);
            final MultipartBody.Part phone = MultipartBody.Part.createFormData("phone", Common.currentUser.getPhone());

            new Thread(new Runnable()
            {
                @Override
                public void run()
                {
                    mService.uploadFile(phone, body)
                            .enqueue(new Callback<String>()
                            {
                                @Override
                                public void onResponse(Call<String> call, Response<String> response)
                                {
                                    Toast.makeText(HomeActivity.this, response.body(), Toast.LENGTH_SHORT).show();
                                }

                                @Override
                                public void onFailure(Call<String> call, Throwable t)
                                {
                                    Toast.makeText(HomeActivity.this, t.getMessage(), Toast.LENGTH_SHORT).show();
                                }
                            });
                }
            }).start();
        }
    }

    private void initDB()
    {
        Common.cardRepository = CardRepository.getInstance(RoomDatabaseDrinkShop.getInstance(this).cardDAO());
        Common.favouriteRepository = FavouriteRepository.getInstance(RoomDatabaseDrinkShop.getInstance(this).favouriteDAO());
    }

    private void getToppingList()
    {
        compositeDisposable.add(mService.getDrinks(Common.TOPPING_MENU_ID)
        .subscribeOn(Schedulers.io())
        .observeOn(AndroidSchedulers.mainThread())
        .subscribe(new Consumer<List<Drink>>()
        {
            @Override
            public void accept(List<Drink> drinks) throws Exception
            {
                Common.toppingList = drinks;
            }
        }));
    }

    private void getMenus()
    {
        compositeDisposable.add(mService.getMenus()
        .subscribeOn(Schedulers.io())
        .observeOn(AndroidSchedulers.mainThread())
        .subscribe(new Consumer<List<Category>>()
        {
            @Override
            public void accept(List<Category> categories) throws Exception
            {
                displayMenu(categories);
            }
        }));
    }

    private void displayMenu(List<Category> categories)
    {
        CategoryAdapter adapter = new CategoryAdapter(this, categories);
        menuRecycler.setAdapter(adapter);
    }

    private void getBannerImage()
    {
        compositeDisposable.add(mService.getBanners()
        .subscribeOn(Schedulers.io())
        .observeOn(AndroidSchedulers.mainThread())
        .subscribe(new Consumer<List<Banner>>()
        {
            @Override
            public void accept(List<Banner> banners) throws Exception
            {
                displayImage(banners);
            }
        }, new Consumer<Throwable>()
        {
            @Override
            public void accept(Throwable throwable) throws Exception
            {
                Toast.makeText(HomeActivity.this, throwable.getMessage(), Toast.LENGTH_SHORT).show();
            }
        }));
    }

    private void displayImage(List<Banner> banners)
    {
        HashMap<String, String> bannerMap = new HashMap<>();
        for(Banner banner: banners)
            bannerMap.put(banner.getName(), banner.getLink());

        for(String name : bannerMap.keySet())
        {
            TextSliderView textSliderView = new TextSliderView(this);
            textSliderView.description(name)
                    .image(bannerMap.get(name))
                    .setScaleType(BaseSliderView.ScaleType.Fit);

            sliderLayout.addSlider(textSliderView);
        }
    }

    @Override
    protected void onDestroy()
    {
        super.onDestroy();
        compositeDisposable.dispose();
    }

    @Override
    public void onBackPressed()
    {
        DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
        if (drawer.isDrawerOpen(GravityCompat.START))
        {
            drawer.closeDrawer(GravityCompat.START);
        } else
        {
            if(isBackPressed)
            {
                super.onBackPressed();
                return;
            }
            isBackPressed = true;
            Toast.makeText(this, "Click once again to exit", Toast.LENGTH_SHORT).show();
        }
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu)
    {
        // Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.menu_action_bar, menu);
        View view = menu.findItem(R.id.card_menu).getActionView();
        badge = view.findViewById(R.id.badge);
        card_icon = view.findViewById(R.id.card_icon);
        card_icon.setOnClickListener(new View.OnClickListener()
        {
            @Override
            public void onClick(View v)
            {
                startActivity(new Intent(HomeActivity.this, CardActivity.class));
            }
        });
        updateCardCount();


        return true;
    }

    private void updateCardCount()
    {
        if(badge == null) return;
        runOnUiThread(new Runnable()
        {
            @Override
            public void run()
            {
                if(Common.cardRepository.getCardCount() == 0)
                    badge.setVisibility(View.INVISIBLE);
                else
                {
                    badge.setVisibility(View.VISIBLE);
                    badge.setText(String.valueOf(Common.cardRepository.getCardCount()));
                }
            }
        });
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item)
    {
        // Handle action bar item clicks here. The action bar will
        // automatically handle clicks on the Home/Up button, so long
        // as you specify a parent activity in AndroidManifest.xml.
        int id = item.getItemId();

        //noinspection SimplifiableIfStatement
        if (id == R.id.nav_favourite)
        {
            startActivity(new Intent(HomeActivity.this, FavouriteListActivity.class));
        }

        return super.onOptionsItemSelected(item);
    }

    @SuppressWarnings("StatementWithEmptyBody")
    @Override
    public boolean onNavigationItemSelected(MenuItem item)
    {
        // Handle navigation view item clicks here.
        int id = item.getItemId();

        if (id == R.id.nav_sign_out)
        {
            AlertDialog.Builder builder = new AlertDialog.Builder(this);
            builder.setTitle("Exit");
            builder.setMessage("Do you want to exit this app?");
            builder.setNegativeButton("No", new DialogInterface.OnClickListener()
            {
                @Override
                public void onClick(DialogInterface dialog, int which)
                {
                    dialog.dismiss();
                }
            });
            builder.setPositiveButton("Yes", new DialogInterface.OnClickListener()
            {
                @Override
                public void onClick(DialogInterface dialog, int which)
                {
                    AccountKit.logOut();
                    Intent intent = new Intent(HomeActivity.this, MainActivity.class);
                    intent.addFlags(Intent.FLAG_ACTIVITY_CLEAR_TOP);
                    startActivity(intent);
                    finish();
                }
            });
            builder.show();
        }

        DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
        drawer.closeDrawer(GravityCompat.START);
        return true;
    }

    @Override
    protected void onResume()
    {
        super.onResume();
        updateCardCount();
        isBackPressed = false;
    }

    @Override
    public void onProgressUpdate(int percentage, boolean finished)
    {
    }
}
