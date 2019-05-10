package com.example.wiktorpieklik.car_rental.Activities;

import android.app.Activity;
import android.content.ContentValues;
import android.content.Intent;
import android.database.Cursor;
import android.database.SQLException;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;
import android.os.AsyncTask;
import android.os.Bundle;
import android.text.InputType;
import android.view.View;
import android.widget.CheckBox;
import android.widget.EditText;
import android.widget.Toast;

import com.example.wiktorpieklik.car_rental.DataBase;
import com.example.wiktorpieklik.car_rental.R;

public class RegisterActivity extends Activity
{

    private class addClient extends AsyncTask<String, Void, Boolean>
    {
        ContentValues clientsValue = new ContentValues();

        protected Boolean doInBackground(String... editTexts)
        {
            clientsValue.put("NAME", editTexts[0]);
            clientsValue.put("SURNAME", editTexts[1]);
            clientsValue.put("PHONENO", editTexts[2]);
            clientsValue.put("IDCARD", editTexts[3]);
            clientsValue.put("LOGIN", editTexts[4]);
            clientsValue.put("PASSWORD", editTexts[5]);
            clientsValue.put("EMAIL", editTexts[6]);

            try
            {
                SQLiteOpenHelper helper = new DataBase(getApplicationContext());
                SQLiteDatabase db2 = helper.getWritableDatabase();
                db2.insert("CLIENTS",null, clientsValue);
                db2.close();
                return true;

            }catch(SQLException ex)
            {
                return false;
            }
        }

        protected void onPostExecute(Boolean success)
        {
            if(!success)
            {
                Toast.makeText(getApplicationContext(),getResources().getString(R.string.error),Toast.LENGTH_SHORT).show();
            }

        }
    }
    @Override
    protected void onCreate(Bundle savedInstanceState)
    {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_register);
    }

    public void passwordCheckBox(View view)
    {
        CheckBox checkBox = findViewById(R.id.rPaswwordCheckBox);
        EditText password = findViewById(R.id.rPasswordET);
        if(checkBox.isChecked())
        {
            password.setInputType(InputType.TYPE_TEXT_VARIATION_VISIBLE_PASSWORD);
        }
        else
        {
            password.setInputType(InputType.TYPE_CLASS_TEXT|InputType.TYPE_TEXT_VARIATION_PASSWORD);
        }
    }

    public void register(View view)
    {
        //odwłoania do pól tekstowych
        EditText login = findViewById(R.id.rLoginET);
        EditText name = findViewById(R.id.rNameET);
        EditText surname = findViewById(R.id.rSurnameET);
        EditText phoneNo = findViewById(R.id.rPhoneNoET);
        EditText idCard = findViewById(R.id.rIdNoET);
        EditText email = findViewById(R.id.rEmailET);
        EditText password = findViewById(R.id.rPasswordET);
        //////////////////////////////

        SQLiteOpenHelper helper = new DataBase(this);
        SQLiteDatabase db = helper.getReadableDatabase();

        Cursor check = db.rawQuery("select count(*) from CLIENTS where LOGIN='"+login.getText().toString()+"'",null);
        try
        {
            check.moveToFirst();
            int count = check.getInt(0);
            if(count>0)
            {
                check.close();
                db.close();
                Toast.makeText(this,getResources().getString(R.string.loginInUse),Toast.LENGTH_LONG).show();
                login.setText("");
            }
            else
            {
                new addClient().execute(name.getText().toString(),
                        surname.getText().toString(),
                        phoneNo.getText().toString(),
                        idCard.getText().toString(),
                        login.getText().toString(),
                        password.getText().toString(),
                        email.getText().toString());

                Intent intent = new Intent();
                setResult(RESULT_OK,intent);
                finish();
            }

        }catch(SQLException ex)
        {

        }
    }
}
