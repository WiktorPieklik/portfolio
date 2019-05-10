package com.example.wiktorpieklik.car_rental.Activities;

import android.content.ContentValues;
import android.database.SQLException;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.EditText;
import android.widget.Spinner;
import android.widget.Toast;

import com.example.wiktorpieklik.car_rental.Commons.Common;
import com.example.wiktorpieklik.car_rental.Model.Car;
import com.example.wiktorpieklik.car_rental.DataBase;
import com.example.wiktorpieklik.car_rental.R;

import java.util.ArrayList;
import java.util.List;

public class AddOfferActivity extends AppCompatActivity
{

    private Car car;
    private EditText priceET;

    @Override
    protected void onCreate(Bundle savedInstanceState)
    {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_add_offer);

        Spinner carSpinner = findViewById(R.id.carsSpinner);

        List<String> carList = new ArrayList<String>();
        for(int i = 0; i< Common.carsInOffer.size(); i++)
        {
            carList.add(Common.carsInOffer.get(i).getCarInfoBrand()+" "+Common.carsInOffer.get(i).getCarInfoModel());
        }
        ArrayAdapter<String> adapter = new ArrayAdapter<String>(this,R.layout.spinner_text,carList);
        carSpinner.setAdapter(adapter);
        carSpinner.setOnItemSelectedListener(new AdapterView.OnItemSelectedListener()
        {
            @Override
            public void onItemSelected(AdapterView<?> parent, View view, int position, long id)
            {
                car = Common.carsInOffer.get(position);
            }

            @Override
            public void onNothingSelected(AdapterView<?> parent)
            {

            }
        });
        priceET =findViewById(R.id.addOfferPriceET);
    }

    public void addOffer(View view)
    {
        if(OwnerActivity.carsInOfferCount>0)
        {
            try
            {
                SQLiteOpenHelper helper = new DataBase(this);
                SQLiteDatabase db = helper.getWritableDatabase();

                ContentValues newOffer = new ContentValues();
                newOffer.put("CARID", car.getCarId());
                newOffer.put("OFFERPRICE", Float.parseFloat(priceET.getText().toString()));
                newOffer.put("AVAILABLE", 0);

                ContentValues updateCar = new ContentValues();
                updateCar.put("INOFFER", 1);

                db.insert("OFFERS", null, newOffer);
                db.update("CARS", updateCar, "_id=?", new String[]{Integer.toString(car.getCarId())});
                Toast.makeText(this, "Pomyślnie dodano nową ofertę", Toast.LENGTH_SHORT).show();
                db.close();

                OwnerActivity.menuOn = true;
                OwnerActivity.addOferOn = false;
                finish();
            } catch (SQLException ex)
            {
                Toast.makeText(this, "Błąd: " + ex.toString(), Toast.LENGTH_LONG).show();
            }
        }
    }
}
