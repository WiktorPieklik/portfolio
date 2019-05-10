package com.example.wiktorpieklik.car_rental.Activities;

import android.content.ContentValues;
import android.content.Intent;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import com.example.wiktorpieklik.car_rental.DataBase;
import com.example.wiktorpieklik.car_rental.R;

import java.sql.SQLException;

public class AddCarActivity extends AppCompatActivity
{
    private EditText[] editTexts2;
    private Button editButton;
    private Button saveButton;

    @Override
    protected void onCreate(Bundle savedInstanceState)
    {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_add_car);

        EditText carBrand = findViewById(R.id.brandET);
        EditText carModel = findViewById(R.id.modelET);
        EditText productionYear = findViewById(R.id.productionYearET);
        EditText milleage = findViewById(R.id.milleageET);
        EditText capacity = findViewById(R.id.capacityET);
        EditText powerHorse = findViewById(R.id.powerHorseET);
        EditText fuelType = findViewById(R.id.fuelTypeET);
        EditText gearboxType = findViewById(R.id.gearboxTypeET);
        EditText numberPlate = findViewById(R.id.numberPlateET);

        saveButton = findViewById(R.id.addCarButton);

        EditText[] editTexts = {carBrand,carModel,productionYear,milleage,capacity,powerHorse,fuelType,gearboxType,numberPlate};
        editTexts2=editTexts;
    }

    public void addCar(View view)
    {
        try
        {
            SQLiteOpenHelper helper = new DataBase(this);
            SQLiteDatabase db = helper.getWritableDatabase();
            ContentValues carValue = new ContentValues();
            carValue.put("BRAND",editTexts2[0].getText().toString());
            carValue.put("MODEL",editTexts2[1].getText().toString());
            carValue.put("PRODUCTIONYEAR", Integer.parseInt(editTexts2[2].getText().toString()));
            carValue.put("MILLEAGE",Float.parseFloat(editTexts2[3].getText().toString()));
            carValue.put("CAPACITY",Float.parseFloat(editTexts2[4].getText().toString()));
            carValue.put("POWERHORSE",Integer.parseInt(editTexts2[5].getText().toString()));
            carValue.put("FUELTYPE",editTexts2[6].getText().toString());
            carValue.put("GEARBOXTYPE",editTexts2[7].getText().toString());
            carValue.put("NUMBERPLATE",editTexts2[8].getText().toString());
            carValue.put("ISRENTED",0);
            carValue.put("INOFFER",0);
            db.insert("CARS",null,carValue);
            Toast.makeText(this,"Pomyślnie dodano auto",Toast.LENGTH_SHORT).show();
            db.close();
            finish();
        }catch(android.database.SQLException ex)
        {
            Toast.makeText(this,"Błąd: "+ex.toString(),Toast.LENGTH_LONG).show();
        }
    }
}
