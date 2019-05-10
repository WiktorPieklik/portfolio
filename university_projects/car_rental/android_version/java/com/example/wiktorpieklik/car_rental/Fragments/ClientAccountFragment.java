package com.example.wiktorpieklik.car_rental.Fragments;


import android.content.ContentValues;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteException;
import android.database.sqlite.SQLiteOpenHelper;
import android.os.Bundle;
import android.app.Fragment;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import com.example.wiktorpieklik.car_rental.Activities.ClientActivity;
import com.example.wiktorpieklik.car_rental.DataBase;
import com.example.wiktorpieklik.car_rental.R;


/**
 * A simple {@link Fragment} subclass.
 */
public class ClientAccountFragment extends Fragment implements View.OnClickListener
{

    EditText clientName, surname, phoneNo, identityCard, clientEmail, login, password;
    EditText[]  editTexts2;
    Button editButton;
    Button saveButton;

    public ClientAccountFragment()
    {
        // Required empty public constructor
    }


    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState)
    {
        // Inflate the layout for this fragment
        View layout = inflater.inflate(R.layout.fragment_client_account, container, false);
        clientName = layout.findViewById(R.id.cNameET);
        surname = layout.findViewById(R.id.cSurnameET);
        phoneNo = layout.findViewById(R.id.cPhoneNoET);
        identityCard = layout.findViewById(R.id.cIdNoET);
        clientEmail = layout.findViewById(R.id.cEmailET);
        login = layout.findViewById(R.id.cLoginET);
        password = layout.findViewById(R.id.cPasswordET);
        editTexts2 = new EditText[]{clientName,surname,phoneNo,identityCard,clientEmail,login,password};

        editButton = layout.findViewById(R.id.clientEditButton);
        saveButton = layout.findViewById(R.id.clientSaveButton);
        editButton.setOnClickListener(this);
        saveButton.setOnClickListener(this);

        try
        {
         SQLiteOpenHelper helper = new DataBase(getActivity());
         SQLiteDatabase db = helper.getReadableDatabase();
         Cursor cursor = db.query("CLIENTS", new String[]{"*"},"_id=?", new String[]{Integer.toString(ClientActivity.clientID)},null,null,null);
         if(cursor.moveToFirst())
         {
             for(int i=0;i<editTexts2.length;i++)
             {
                 editTexts2[i].setText(cursor.getString(i+1));
             }
         }
         cursor.close();
         db.close();

        }catch(SQLiteException ex)
        {
            Toast.makeText(getActivity(),"Błąd: "+ex.toString(),Toast.LENGTH_LONG).show();
        }
        return layout;
    }

    @Override
    public void onClick(View view)
    {
        if(view.getId()==R.id.clientEditButton)
            editClientData(view);
        else
            saveClientData(view);
    }

    @Override
    public void onDestroy()
    {
        super.onDestroy();
        ClientActivity.otherFragment=false;
    }

    public void saveClientData(View view)
    {
        for(int i=0;i<editTexts2.length;i++)
        {
            editTexts2[i].setEnabled(false);
        }
        editButton.setVisibility(View.VISIBLE);
        saveButton.setVisibility(View.GONE);

        SQLiteOpenHelper helper = new DataBase(getActivity());
        SQLiteDatabase db = helper.getWritableDatabase();
        try
        {
            ContentValues userValues = new ContentValues();
            userValues.put("NAME",editTexts2[0].getText().toString());
            userValues.put("SURNAME",editTexts2[1].getText().toString());
            userValues.put("PHONENO",editTexts2[2].getText().toString());
            userValues.put("IDCARD", editTexts2[3].getText().toString());
            userValues.put("LOGIN",editTexts2[4].getText().toString());
            userValues.put("PASSWORD",editTexts2[5].getText().toString());
            userValues.put("EMAIL",editTexts2[6].getText().toString());
            db.update("CLIENTS",userValues,"_id=?",new String[]{Integer.toString(ClientActivity.clientID)});
            db.close();
            Toast.makeText(getActivity(),"Dane zostały zaktualizowane",Toast.LENGTH_SHORT).show();

        }catch(SQLiteException ex)
        {
            Toast.makeText(getActivity(),"Błąd: "+ex.toString(),Toast.LENGTH_LONG).show();
        }
    }
    public void editClientData(View view)
    {
        for(int i=0;i<editTexts2.length;i++)
        {
            editTexts2[i].setEnabled(true);
        }
        editButton.setVisibility(View.GONE);
        saveButton.setVisibility(View.VISIBLE);
    }

}
