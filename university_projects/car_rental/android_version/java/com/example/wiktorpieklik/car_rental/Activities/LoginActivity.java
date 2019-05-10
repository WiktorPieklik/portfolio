package com.example.wiktorpieklik.car_rental.Activities;

import android.app.Activity;
import android.content.Intent;
import android.database.Cursor;
import android.database.SQLException;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;
import android.os.Handler;
import android.os.Bundle;
import android.view.View;
import android.widget.EditText;
import android.widget.Toast;

import com.example.wiktorpieklik.car_rental.DataBase;
import com.example.wiktorpieklik.car_rental.R;

public class LoginActivity extends Activity
{
    private int registerCode=1;
    private boolean exit = false; //zmienna potrzebna do zdarzeń związanych z wciskaniem przycisku wstecz

    @Override
    protected void onCreate(Bundle savedInstanceState)
    {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);
    }

    public void startRegister(View view)
    {
        /*Intent registerIntent = new Intent(this, RegisterActivity.class);
        startActivity(registerIntent); */
        Intent registerIntent = new Intent(this, RegisterActivity.class);
        startActivityForResult(registerIntent,registerCode);
    }

    @Override
    public void onActivityResult(int requestedCode, int resultCode, Intent intent)
    {
        if(requestedCode == registerCode && resultCode == RESULT_OK)
        {
            Toast.makeText(getApplicationContext(),"Pomyślnie utworzono konto", Toast.LENGTH_SHORT).show();
        }
    }

    public void logInAction(View view)
    {
        EditText loginET = findViewById(R.id.loginEditText);
        EditText passwordET = findViewById(R.id.passwordEditText);
        String login = loginET.getText().toString();
        String password = passwordET.getText().toString();

        try
        {
            SQLiteOpenHelper helper = new DataBase(this);
            SQLiteDatabase db = helper.getReadableDatabase();
            Cursor cursor = db.query("CLIENTS", new String[]{"_id","LOGIN","PASSWORD"},
                    "LOGIN=? AND PASSWORD=?", new String[]{login, password},null, null, null);
            if(cursor.moveToFirst())
            {
                if(cursor.getInt(0) == 1) //administrator ma id=1, a więc można otworzyć ownerActivity
                {
                    Toast.makeText(this, "Witaj!", Toast.LENGTH_SHORT).show();
                    Intent ownerIntent = new Intent(this, OwnerActivity.class);
                    startActivity(ownerIntent);
                }
                else
                {
                    Toast.makeText(this, "Witaj!", Toast.LENGTH_SHORT).show();
                    Intent clientIntent = new Intent(this, ClientActivity.class);
                    clientIntent.putExtra(ClientActivity.clientId, cursor.getInt(0));
                    startActivity(clientIntent);
                }
            }
            else
            {
                Toast.makeText(this,"Nie ma takiego użytkownika",Toast.LENGTH_LONG).show();
            }
            //usuwanie zawartości z aktywności logowania
            loginET.setText("");
            passwordET.setText("");
            /////
            cursor.close();
            db.close();
        }catch(SQLException ex)
        {
            Toast.makeText(this, "Błąd", Toast.LENGTH_SHORT).show();
        }
    }

    @Override
    public void onBackPressed()
    {
        if(exit)
        {
            finish();
        }
        else
        {
            exit = true;
            Toast.makeText(this,getResources().getString(R.string.exit),Toast.LENGTH_SHORT).show();
            Handler handler = new Handler();
            handler.postDelayed(new Runnable()
            {
                @Override
                public void run()
                {
                    exit=false;
                }
            }, 2000);
        }
    }
}
