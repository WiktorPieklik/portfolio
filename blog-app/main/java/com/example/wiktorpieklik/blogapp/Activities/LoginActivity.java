package com.example.wiktorpieklik.blogapp.Activities;

import android.content.Intent;
import android.support.annotation.NonNull;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.text.TextUtils;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ProgressBar;
import android.widget.Toast;

import com.example.wiktorpieklik.blogapp.Comons.Common;
import com.example.wiktorpieklik.blogapp.R;
import com.google.android.gms.tasks.OnCompleteListener;
import com.google.android.gms.tasks.Task;
import com.google.firebase.auth.AuthResult;
import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.auth.FirebaseUser;

public class LoginActivity extends AppCompatActivity
{
    private EditText email, password;
    private Button loginButton, registerButton;
    private ProgressBar progressBar;

    @Override
    protected void onCreate(Bundle savedInstanceState)
    {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);


        //init views
        email = findViewById(R.id.logEmail);
        password = findViewById(R.id.logPassword);
        loginButton = findViewById(R.id.logButton);
        registerButton = findViewById(R.id.logRegisterBtn);
        progressBar = findViewById(R.id.logProgressBar);
        progressBar.setVisibility(View.INVISIBLE);

        loginButton.setOnClickListener(new View.OnClickListener()
        {
            @Override
            public void onClick(View v)
            {
                progressBar.setVisibility(View.VISIBLE);
                loginButton.setVisibility(View.INVISIBLE);

                final String mail = email.getText().toString();
                final String pass = password.getText().toString();

                if(TextUtils.isEmpty(mail) || TextUtils.isEmpty(pass))
                {
                    progressBar.setVisibility(View.INVISIBLE);
                    loginButton.setVisibility(View.VISIBLE);
                    showMessage("Fill in all the fields");
                }
                else
                    signIn(mail,pass);
            }
        });

        registerButton.setOnClickListener(new View.OnClickListener()
        {
            @Override
            public void onClick(View v)
            {
                startActivity(new Intent(LoginActivity.this, RegisterActivity.class));
                finish();
            }
        });
    }

    private void signIn(final String emailTxt, String passTxt)
    {
        Common.mAuth.signInWithEmailAndPassword(emailTxt, passTxt)
        .addOnCompleteListener(new OnCompleteListener<AuthResult>()
        {
            @Override
            public void onComplete(@NonNull Task<AuthResult> task)
            {
                if(task.isSuccessful())
                {
                    loginButton.setVisibility(View.INVISIBLE);
                    progressBar.setVisibility(View.VISIBLE);
                    Common.currentUser = Common.mAuth.getCurrentUser();
                    updateUi();
                }
                else
                {
                    showMessage(task.getException().getMessage());
                    loginButton.setVisibility(View.VISIBLE);
                    progressBar.setVisibility(View.INVISIBLE);

                    //clear edittextes
                    email.setText("");
                    password.setText("");
                }
            }
        });
    }

    @Override
    protected void onStart()
    {
        super.onStart();
        FirebaseUser user = Common.currentUser;
        if(user != null)
            updateUi();
    }

    private void updateUi()
    {
        startActivity(new Intent(this, HomeActivity.class));
        finish();
    }

    private void showMessage(String text)
    {
        Toast.makeText(this, text, Toast.LENGTH_SHORT).show();
    }
}
