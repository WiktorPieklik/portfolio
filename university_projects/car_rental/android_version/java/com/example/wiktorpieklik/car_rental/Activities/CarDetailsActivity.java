package com.example.wiktorpieklik.car_rental.Activities;

import android.app.AlertDialog;
import android.content.ContentValues;
import android.content.DialogInterface;
import android.database.SQLException;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import com.example.wiktorpieklik.car_rental.Commons.Common;
import com.example.wiktorpieklik.car_rental.Model.Car;
import com.example.wiktorpieklik.car_rental.DataBase;
import com.example.wiktorpieklik.car_rental.R;

public class CarDetailsActivity extends AppCompatActivity
{

    public static final String carID ="XD";
    private Car car;
    private EditText[] editTexts2;
    private Button editButton;
    private Button saveButton;

    @Override
    protected void onCreate(Bundle savedInstanceState)
    {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_car_details);
        int ID = (Integer)getIntent().getExtras().get(carID);

        for(int i = 0; i< Common.cars.size(); i++)
        {
            if(Common.cars.get(i).getCarId() == ID)
            {
                car = Common.cars.get(i);
                break;
            }
        }

        initViews();
        setInfo();

    }

    private void setInfo()
    {
        editTexts2[0].setText(car.getCarInfoBrand());
        editTexts2[1].setText(car.getCarInfoModel());
        editTexts2[2].setText(Integer.toString(car.getCarInfoProductionYear()));
        editTexts2[3].setText(Float.toString(car.getCarInfoMilleage()));
        editTexts2[4].setText(Float.toString(car.getCarInfoCapacity()));
        editTexts2[5].setText(Integer.toString(car.getCarInfoPowerHorse()));
        editTexts2[6].setText(car.getCarInfoFuelType());
        editTexts2[7].setText(car.getCarInfoGearboxType());
        editTexts2[8].setText(car.getCarInfoNumberPlate());
    }

    private void initViews()
    {
        EditText carBrand = findViewById(R.id.brandET);
        EditText carModel = findViewById(R.id.modelET);
        EditText productionYear = findViewById(R.id.productionYearET);
        EditText milleage = findViewById(R.id.milleageET);
        EditText capacity = findViewById(R.id.capacityET);
        EditText powerHorse = findViewById(R.id.powerHorseET);
        EditText fuelType = findViewById(R.id.fuelTypeET);
        EditText gearboxType = findViewById(R.id.gearboxTypeET);
        EditText numberPlate = findViewById(R.id.numberPlateET);
        editButton = findViewById(R.id.editButton);
        saveButton = findViewById(R.id.saveButton);
        editTexts2 = new EditText[]{carBrand,carModel,productionYear,milleage,capacity,powerHorse,fuelType,gearboxType,numberPlate};
    }

    public void editButtonClick(View view)
    {
        for(int i=0;i<editTexts2.length;i++)
        {
            editTexts2[i].setEnabled(true);
        }
        editButton.setVisibility(View.GONE);
        saveButton.setVisibility(View.VISIBLE);
    }

    public void saveButtonClick(View view)
    {
        for(int i=0;i<editTexts2.length;i++)
        {
            editTexts2[i].setEnabled(false);
        }
        editButton.setVisibility(View.VISIBLE);
        saveButton.setVisibility(View.GONE);

        try
        {
            SQLiteOpenHelper helper = new DataBase(this);
            SQLiteDatabase db = helper.getWritableDatabase();

            ContentValues carDetails = new ContentValues();
            carDetails.put("BRAND",editTexts2[0].getText().toString());
            carDetails.put("MODEL", editTexts2[1].getText().toString());
            carDetails.put("PRODUCTIONYEAR", Integer.parseInt(editTexts2[2].getText().toString()));
            carDetails.put("MILLEAGE", Float.parseFloat(editTexts2[3].getText().toString()));
            carDetails.put("CAPACITY", Float.parseFloat(editTexts2[4].getText().toString()));
            carDetails.put("POWERHORSE", Integer.parseInt(editTexts2[5].getText().toString()));
            carDetails.put("FUELTYPE", editTexts2[6].getText().toString());
            carDetails.put("GEARBOXTYPE", editTexts2[7].getText().toString());
            carDetails.put("NUMBERPLATE", editTexts2[8].getText().toString());
            db.update("CARS", carDetails, "_id=?", new String[]{Integer.toString(car.getCarId())});
            Toast.makeText(this,"Pomyślnie zaktualizowano dane",Toast.LENGTH_SHORT).show();
            db.close();
            finish();
        }catch(SQLException ex)
        {
            Toast.makeText(this,"Błąd: "+ex.toString(),Toast.LENGTH_LONG).show();
        }
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu)
    {
        getMenuInflater().inflate(R.menu.menu_cars, menu);
        return super.onCreateOptionsMenu(menu);
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item)
    {
        AlertDialog.Builder builder = new AlertDialog.Builder(this);
        builder.setTitle("Uwaga");
        builder.setMessage("Czy na pewno chcesz usunąć auto?");
        builder.setPositiveButton("Tak", new DialogInterface.OnClickListener()
        {
            @Override
            public void onClick(DialogInterface dialog, int which)
            {
                boolean found = false;
                for (int i = 0; i < Common.offers.size(); i++)
                {
                    if (Common.offers.get(i).getOfferCarId() == car.getCarId())
                    {
                        found = true;
                        Toast.makeText(getApplicationContext(), "Wpierw usuń ofertę z tym autem zanim usuniesz auto!", Toast.LENGTH_LONG).show();
                        break;
                    }
                }

                if (!found)
                {
                    try
                    {
                        SQLiteOpenHelper helper = new DataBase(getApplicationContext());
                        SQLiteDatabase db = helper.getWritableDatabase();
                        db.delete("CARS", "_id=?", new String[]{Integer.toString(car.getCarId())});
                        db.delete("ORDERS","CARID=?", new String[]{Integer.toString(car.getCarId())});
                        db.close();
                        Toast.makeText(getApplicationContext(), "Pomyślnie usunięto auto", Toast.LENGTH_LONG).show();
                        finish();
                    }catch(SQLException ex)
                    {
                        Toast.makeText(getApplicationContext(),"Błąd: "+ex.toString(),Toast.LENGTH_LONG).show();
                    }
                }
            }
        });
        builder.setNegativeButton("Nie", new DialogInterface.OnClickListener()
        {
            @Override
            public void onClick(DialogInterface dialog, int which)
            {
                dialog.dismiss();
            }
        });

        AlertDialog alertDialog = builder.create();
        alertDialog.show();
        return super.onOptionsItemSelected(item);
    }
}
