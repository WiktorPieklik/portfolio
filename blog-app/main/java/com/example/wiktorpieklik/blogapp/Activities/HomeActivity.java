package com.example.wiktorpieklik.blogapp.Activities;

import android.Manifest;
import android.app.AlertDialog;
import android.app.Dialog;
import android.content.Intent;
import android.content.pm.PackageManager;
import android.graphics.Color;
import android.graphics.drawable.ColorDrawable;
import android.net.Uri;
import android.os.Bundle;
import android.support.annotation.NonNull;
import android.support.design.widget.FloatingActionButton;
import android.support.design.widget.Snackbar;
import android.support.v4.app.ActivityCompat;
import android.support.v4.app.Fragment;
import android.support.v4.app.FragmentManager;
import android.support.v4.app.FragmentTransaction;
import android.text.TextUtils;
import android.view.Gravity;
import android.view.LayoutInflater;
import android.view.View;
import android.support.v4.view.GravityCompat;
import android.support.v7.app.ActionBarDrawerToggle;
import android.view.MenuItem;
import android.support.design.widget.NavigationView;
import android.support.v4.widget.DrawerLayout;

import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.view.Menu;
import android.widget.ImageView;
import android.widget.ProgressBar;
import android.widget.TextView;
import android.widget.Toast;

import com.bumptech.glide.Glide;
import com.example.wiktorpieklik.blogapp.Comons.Common;
import com.example.wiktorpieklik.blogapp.Fragments.HomeFragment;
import com.example.wiktorpieklik.blogapp.Fragments.ProfileFragment;
import com.example.wiktorpieklik.blogapp.Fragments.SettingsFragment;
import com.example.wiktorpieklik.blogapp.Models.Post;
import com.example.wiktorpieklik.blogapp.R;
import com.google.android.gms.tasks.OnCompleteListener;
import com.google.android.gms.tasks.OnFailureListener;
import com.google.android.gms.tasks.OnSuccessListener;
import com.google.android.gms.tasks.Task;
import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.auth.FirebaseUser;
import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;
import com.google.firebase.storage.FirebaseStorage;
import com.google.firebase.storage.StorageReference;
import com.google.firebase.storage.UploadTask;

public class HomeActivity extends AppCompatActivity
        implements NavigationView.OnNavigationItemSelectedListener
{

    private static final int CHOOSE_PHOTO_REQUEST_CODE = 666;
    private static final int PERMISSION_REQUEST_CODE =333 ;
    Uri chosenImg;
    NavigationView navigationView;

    Dialog addPostDialog;
    ImageView popupUserImg, popupPostImg, popupAddPost;
    TextView popupTitle, popupDescription;
    ProgressBar popupProgressBar;

    @Override
    protected void onCreate(Bundle savedInstanceState)
    {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_home);


        Toolbar toolbar = findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);


        FloatingActionButton fab = findViewById(R.id.fab);
        fab.setOnClickListener(new View.OnClickListener()
        {
            @Override
            public void onClick(View view)
            {
                initPoup();
            }
        });
        DrawerLayout drawer = findViewById(R.id.drawer_layout);
        navigationView = findViewById(R.id.nav_view);
        navigationView.setNavigationItemSelectedListener(this);
        ActionBarDrawerToggle toggle = new ActionBarDrawerToggle(
                this, drawer, toolbar, R.string.navigation_drawer_open, R.string.navigation_drawer_close);
        drawer.addDrawerListener(toggle);
        toggle.syncState();

        updateNavHeader();

        getSupportFragmentManager().addOnBackStackChangedListener(new FragmentManager.OnBackStackChangedListener()
        {
            @Override
            public void onBackStackChanged()
            {
                Fragment fragment = getSupportFragmentManager().findFragmentByTag("visible_frag");
                if(fragment instanceof HomeFragment)
                    getSupportActionBar().setTitle("Home");
                else if(fragment instanceof ProfileFragment)
                    getSupportActionBar().setTitle("Profile");
                else if(fragment instanceof  SettingsFragment)
                    getSupportActionBar().setTitle("Settings");
                else
                    getSupportActionBar().setTitle("Home");
            }
        });

        //set Home fragment as default
        changeFragment(getSupportFragmentManager().beginTransaction(), new HomeFragment());
    }


    @Override
    protected void onActivityResult(int requestCode, int resultCode, Intent data)
    {
        super.onActivityResult(requestCode, resultCode, data);
        if(resultCode == RESULT_OK && requestCode == CHOOSE_PHOTO_REQUEST_CODE)
        {
            if(data != null)
            {
                chosenImg = data.getData();
                popupPostImg.setImageURI(chosenImg);
            }
        }
    }

    private void initPoup()
    {
        addPostDialog = new Dialog(this);
        addPostDialog.setContentView(R.layout.popup_add_post);
        addPostDialog.getWindow().setBackgroundDrawable(new ColorDrawable(Color.TRANSPARENT));
        addPostDialog.getWindow().setLayout(Toolbar.LayoutParams.MATCH_PARENT, Toolbar.LayoutParams.WRAP_CONTENT);
        addPostDialog.getWindow().getAttributes().gravity = Gravity.TOP;
        addPostDialog.show();

        //init views
        popupUserImg = addPostDialog.findViewById(R.id.popup_user_img);
        popupPostImg = addPostDialog.findViewById(R.id.popup_img);
        popupTitle = addPostDialog.findViewById(R.id.popup_title);
        popupDescription = addPostDialog.findViewById(R.id.popup_description);
        popupAddPost = addPostDialog.findViewById(R.id.popup_submit);
        popupProgressBar = addPostDialog.findViewById(R.id.popup_progressBar);

        //default setting
        popupAddPost.setVisibility(View.VISIBLE);
        popupProgressBar.setVisibility(View.INVISIBLE);

        Glide.with(this)
                .load(Common.currentUser.getPhotoUrl())
                .into(popupUserImg);


        popupPostImg.setOnClickListener(new View.OnClickListener()
        {
            @Override
            public void onClick(View v)
            {
                checkPermissionAndOpenGallery();
            }
        });


        popupAddPost.setOnClickListener(new View.OnClickListener()
        {
            @Override
            public void onClick(View v)
            {
                popupAddPost.setVisibility(View.INVISIBLE);
                popupProgressBar.setVisibility(View.VISIBLE);

                final String postTitle = popupTitle.getText().toString();
                final String postDescription = popupDescription.getText().toString();

                if(!TextUtils.isEmpty(postTitle) && !TextUtils.isEmpty(postDescription) && chosenImg != null)
                {
                    StorageReference storageReference = Common.storage.getReference().child(Common.POST_IMG);
                    final StorageReference imageFilePath = storageReference.child(chosenImg.getLastPathSegment());
                    imageFilePath.putFile(chosenImg)
                            .addOnSuccessListener(new OnSuccessListener<UploadTask.TaskSnapshot>()
                            {
                                @Override
                                public void onSuccess(UploadTask.TaskSnapshot taskSnapshot)
                                {
                                    imageFilePath.getDownloadUrl()
                                            .addOnSuccessListener(new OnSuccessListener<Uri>()
                                            {
                                                @Override
                                                public void onSuccess(Uri uri)
                                                {
                                                    String imageDownloadLink = uri.toString();
                                                    Post post = new Post(postTitle, postDescription, imageDownloadLink, Common.currentUser.getUid(), Common.currentUser.getPhotoUrl().toString());

                                                    //adding post to firebase database
                                                    addPost(post);
                                                }
                                            })
                                    .addOnFailureListener(new OnFailureListener()
                                    {
                                        @Override
                                        public void onFailure(@NonNull Exception e)
                                        {
                                            Toast.makeText(HomeActivity.this, e.getMessage(), Toast.LENGTH_SHORT).show();
                                            popupProgressBar.setVisibility(View.INVISIBLE);
                                            popupAddPost.setVisibility(View.VISIBLE);
                                        }
                                    });
                                }
                            });
                }
                else
                {
                    Toast.makeText(HomeActivity.this, "Fill in all fields including image", Toast.LENGTH_SHORT).show();
                    popupAddPost.setVisibility(View.VISIBLE);
                    popupProgressBar.setVisibility(View.INVISIBLE);
                }

            }
        });
    }

    private void addPost(Post post)
    {
        DatabaseReference dbRef = Common.firebaseDb.getReference(Common.POST_KEY).push();

        //getting an unique key
        String key = dbRef.getKey();
        post.setPostKey(key);

        //adding post to firebase db
        dbRef.setValue(post)
                .addOnSuccessListener(new OnSuccessListener<Void>()
                {
                    @Override
                    public void onSuccess(Void aVoid)
                    {
                        Toast.makeText(HomeActivity.this, "Post added successfuly", Toast.LENGTH_SHORT).show();
                        addPostDialog.dismiss();
                    }
                });
    }

    @Override
    public void onRequestPermissionsResult(int requestCode, @NonNull String[] permissions, @NonNull int[] grantResults)
    {
        super.onRequestPermissionsResult(requestCode, permissions, grantResults);

        if(requestCode == PERMISSION_REQUEST_CODE)
        {
            if (grantResults.length > 0 && grantResults[0] == PackageManager.PERMISSION_GRANTED)
            {
                Toast.makeText(this, "Permission granted successfuly", Toast.LENGTH_SHORT).show();
                openGallery();
            }
            else
                Toast.makeText(this, "Permission denied", Toast.LENGTH_SHORT).show();
        }
    }

    private void checkPermissionAndOpenGallery()
    {
        if(ActivityCompat.checkSelfPermission(this, Manifest.permission.READ_EXTERNAL_STORAGE)
                                                != PackageManager.PERMISSION_GRANTED)
            ActivityCompat.requestPermissions(this, new String[]{Manifest.permission.READ_EXTERNAL_STORAGE}, PERMISSION_REQUEST_CODE);
        else
            openGallery();
    }

    private void openGallery()
    {
        Intent chooseImg = new Intent(Intent.ACTION_GET_CONTENT);
        chooseImg.setType("image/*");
        startActivityForResult(chooseImg, CHOOSE_PHOTO_REQUEST_CODE);
    }

    @Override
    public void onBackPressed()
    {
        DrawerLayout drawer = findViewById(R.id.drawer_layout);
        if (drawer.isDrawerOpen(GravityCompat.START))
        {
            drawer.closeDrawer(GravityCompat.START);
        } else
        {
            super.onBackPressed();
        }
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu)
    {
        // Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.home, menu);
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item)
    {
        // Handle action bar item clicks here. The action bar will
        // automatically handle clicks on the Home/Up button, so long
        // as you specify a parent activity in AndroidManifest.xml.
        int id = item.getItemId();

        //noinspection SimplifiableIfStatement
        if (id == R.id.action_settings)
        {
            return true;
        }

        return super.onOptionsItemSelected(item);
    }

    @SuppressWarnings("StatementWithEmptyBody")
    @Override
    public boolean onNavigationItemSelected(MenuItem item)
    {
        // Handle navigation view item clicks here.
        int id = item.getItemId();
        FragmentTransaction ft = getSupportFragmentManager().beginTransaction();

        if (id == R.id.nav_home)
        {
            getSupportActionBar().setTitle("Home");
            changeFragment(ft, new HomeFragment());
        }
        else if(id == R.id.nav_profile)
        {
            getSupportActionBar().setTitle("Your profile");
            changeFragment(ft, new ProfileFragment());
        }
        else if(id == R.id.nav_settings)
        {
            getSupportActionBar().setTitle("Settings");
            changeFragment(ft, new SettingsFragment());
        }
        else if(id == R.id.nav_logout)
        {
            startActivity(new Intent(HomeActivity.this, LoginActivity.class));
            Common.mAuth.signOut();
            Common.currentUser = null;
            finish();
        }

        DrawerLayout drawer = findViewById(R.id.drawer_layout);
        drawer.closeDrawer(GravityCompat.START);
        return true;
    }

    private void changeFragment(FragmentTransaction ft, Fragment fragment)
    {
        ft.replace(R.id.container, fragment, "visible_frag");
        ft.setTransition(FragmentTransaction.TRANSIT_FRAGMENT_FADE);
        ft.addToBackStack(null);
        ft.commit();
    }
    private void updateNavHeader()
    {
        View headerView = navigationView.getHeaderView(0);

        TextView userName = headerView.findViewById(R.id.nav_username);
        TextView email = headerView.findViewById(R.id.nav_useremail);
        ImageView userImg = headerView.findViewById(R.id.nav_userImg);

        email.setText(Common.currentUser.getEmail());
        userName.setText(Common.currentUser.getDisplayName());

        //using Glide to load user's image
        Glide.with(this)
                .load(Common.currentUser.getPhotoUrl())
                .into(userImg);
    }
}
