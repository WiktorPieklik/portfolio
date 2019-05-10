package com.example.wiktorpieklik.blogapp.Activities;

import android.Manifest;
import android.content.ContentResolver;
import android.content.Intent;
import android.content.pm.PackageManager;
import android.net.Uri;
import android.os.Build;
import android.support.annotation.NonNull;
import android.support.v4.app.ActivityCompat;
import android.support.v4.content.ContextCompat;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.text.TextUtils;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.ProgressBar;
import android.widget.Toast;

import com.example.wiktorpieklik.blogapp.Comons.Common;
import com.example.wiktorpieklik.blogapp.R;
import com.google.android.gms.tasks.OnCompleteListener;
import com.google.android.gms.tasks.OnSuccessListener;
import com.google.android.gms.tasks.Task;
import com.google.firebase.auth.AuthResult;
import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.auth.FirebaseUser;
import com.google.firebase.auth.UserProfileChangeRequest;
import com.google.firebase.storage.FirebaseStorage;
import com.google.firebase.storage.StorageReference;
import com.google.firebase.storage.UploadTask;

public class RegisterActivity extends AppCompatActivity
{

    private static final int PERMISSION_REQUEST_CODE = 123;
    private static final int CHOOSE_PHOTO_CODE = 234;
    ImageView userImg;
    Uri choosenImg;
    private EditText userEmail, userPassword, userPassword2, userName;
    private ProgressBar loadProgressBar;
    private Button registerBtn;

    @Override
    public void onRequestPermissionsResult(int requestCode, @NonNull String[] permissions, @NonNull int[] grantResults)
    {
        super.onRequestPermissionsResult(requestCode, permissions, grantResults);
        if(requestCode == PERMISSION_REQUEST_CODE)
        {
            if(grantResults.length > 0 && grantResults[0] == PackageManager.PERMISSION_GRANTED)
            {
                Toast.makeText(this, "Permission granted successfuly!", Toast.LENGTH_SHORT).show();
                openGallery();
            }
        }
    }

    @Override
    protected void onActivityResult(int requestCode, int resultCode, Intent data)
    {
        super.onActivityResult(requestCode, resultCode, data);

        if(resultCode == RESULT_OK && requestCode == CHOOSE_PHOTO_CODE)
        {
            if(data != null)
            {
                //user has successfuly choosen photo
                //need to save its reference to Uri var
                choosenImg = data.getData();
                userImg.setImageURI(choosenImg);
            }
        }
    }

    @Override
    protected void onCreate(Bundle savedInstanceState)
    {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_register);

        //init views
        userEmail = findViewById(R.id.regMail);
        userName = findViewById(R.id.regName);
        userPassword = findViewById(R.id.regPassword);
        userPassword2 = findViewById(R.id.regPassword2);
        loadProgressBar = findViewById(R.id.regProgressBar);
        registerBtn = findViewById(R.id.regButton);


        registerBtn.setOnClickListener(new View.OnClickListener()
        {
            @Override
            public void onClick(View v)
            {
                registerBtn.setVisibility(View.INVISIBLE);
                loadProgressBar.setVisibility(View.VISIBLE);
                final String email = userEmail.getText().toString();
                final String password = userPassword.getText().toString();
                final String password2 = userPassword2.getText().toString();
                final String name = userName.getText().toString();

                if(TextUtils.isEmpty(email) || TextUtils.isEmpty(password) || !password.equals(password2))
                {
                    showMessage("Please fill in all the fields");
                    registerBtn.setVisibility(View.VISIBLE);
                    loadProgressBar.setVisibility(View.INVISIBLE);
                }
                else
                {
                    if(choosenImg == null)
                        choosenImg = Uri.parse(ContentResolver.SCHEME_ANDROID_RESOURCE +
                                "://" + getResources().getResourcePackageName(R.drawable.userphoto)
                                + '/' + getResources().getResourceTypeName(R.drawable.userphoto) + '/' + getResources().getResourceEntryName(R.drawable.userphoto));
                    createUserAccount(name, email, password);
                }
            }
        });


        loadProgressBar.setVisibility(View.INVISIBLE);
        userImg = findViewById(R.id.regUserImg);
        userImg.setOnClickListener(new View.OnClickListener()
        {
            @Override
            public void onClick(View v)
            {
                if(Build.VERSION.SDK_INT >= 22)
                    checkAndRequestForPermission();
                else
                    openGallery();
            }
        });
    }

    private void createUserAccount(final String name, String email, String password)
    {
        Common.mAuth.createUserWithEmailAndPassword(email, password)
                .addOnCompleteListener(new OnCompleteListener<AuthResult>()
                {
                    @Override
                    public void onComplete(@NonNull Task<AuthResult> task)
                    {
                        if(task.isSuccessful())
                        {
                            showMessage("User registered successfuly! :D");
                            Common.currentUser = Common.mAuth.getCurrentUser();
                            updateUsersInfo(name, choosenImg);
                        }
                        else
                        {
                            showMessage(task.getException().getMessage());
                            registerBtn.setVisibility(View.VISIBLE);
                            loadProgressBar.setVisibility(View.INVISIBLE);
                        }
                    }
                });
    }

    private void updateUsersInfo(final String name, Uri choosenImg)
    {
        StorageReference mStorage = Common.storage.getReference().child(Common.USER_PHOTOS);
        final StorageReference imgFile = mStorage.child(choosenImg.getLastPathSegment());
        imgFile.putFile(choosenImg)
                .addOnSuccessListener(new OnSuccessListener<UploadTask.TaskSnapshot>()
                {
                    @Override
                    public void onSuccess(UploadTask.TaskSnapshot taskSnapshot)
                    {
                        imgFile.getDownloadUrl()
                                .addOnSuccessListener(new OnSuccessListener<Uri>()
                                {
                                    @Override
                                    public void onSuccess(Uri uri)
                                    {
                                        UserProfileChangeRequest changeRequest = new UserProfileChangeRequest.Builder()
                                                .setDisplayName(name)
                                                .setPhotoUri(uri)
                                                .build();
                                        Common.currentUser.updateProfile(changeRequest)
                                                .addOnCompleteListener(new OnCompleteListener<Void>()
                                                {
                                                    @Override
                                                    public void onComplete(@NonNull Task<Void> task)
                                                    {
                                                        if(task.isSuccessful())
                                                        {
                                                            showMessage("Register complete");
                                                            updateUi();
                                                        }
                                                    }
                                                });
                                    }
                                });

                    }
                });
    }

    private void updateUi()
    {
        startActivity(new Intent(this, HomeActivity.class));
        finish();
    }


    private void showMessage(String text)
    {
        Toast.makeText(RegisterActivity.this, text, Toast.LENGTH_SHORT).show();
    }
    private void openGallery()
    {
        Intent galleryIntent = new Intent(Intent.ACTION_GET_CONTENT);
        galleryIntent.setType("image/*");
        startActivityForResult(galleryIntent, CHOOSE_PHOTO_CODE);
    }

    private void checkAndRequestForPermission()
    {
        if(ContextCompat.checkSelfPermission(this, Manifest.permission.READ_EXTERNAL_STORAGE)
            != PackageManager.PERMISSION_GRANTED)
            ActivityCompat.requestPermissions(this, new String[]{Manifest.permission.READ_EXTERNAL_STORAGE},PERMISSION_REQUEST_CODE);
        else
            openGallery();
    }
}
