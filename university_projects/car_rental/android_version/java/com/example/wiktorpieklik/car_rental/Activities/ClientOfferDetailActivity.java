package com.example.wiktorpieklik.car_rental.Activities;

import android.app.Dialog;
import android.content.ContentValues;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteException;
import android.database.sqlite.SQLiteOpenHelper;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.DatePicker;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

import com.example.wiktorpieklik.car_rental.Commons.Common;
import com.example.wiktorpieklik.car_rental.Model.Car;
import com.example.wiktorpieklik.car_rental.DataBase;
import com.example.wiktorpieklik.car_rental.Model.Offer;
import com.example.wiktorpieklik.car_rental.R;

import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.util.Calendar;
import java.util.Date;
import java.util.Locale;

public class ClientOfferDetailActivity extends AppCompatActivity implements View.OnClickListener
{
    public static final String offerId="XDXD";
    private Car car = null;
    Dialog purchaseDialog;
    String purchaseDate="01.01.2016", returnDate="01.01.2016";
    boolean purchase=true;
    float price, discount;
    TextView purchaseTxt, returnTxt,sumTxt, brand, model, productionYear, milleage, capacity, powerhorse, fuelType, gearbox, offerPrice;
    EditText discountET;

    @Override
    protected void onCreate(Bundle savedInstanceState)
    {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_client_offer_detail);

        initViews();
        findCar(Common.currentUserOffer.getOfferId());
        setInfo(this.car);
    }

    private void setInfo(Car car)
    {
        brand.setText(this.car.getCarInfoBrand());
        model.setText(this.car.getCarInfoModel());
        productionYear.setText(this.car.getCarInfoProductionYear()+" rok");
        milleage.setText(this.car.getCarInfoMilleage()+" km");
        capacity.setText(this.car.getCarInfoCapacity()+"l");
        powerhorse.setText(this.car.getCarInfoPowerHorse()+" KM");
        fuelType.setText(this.car.getCarInfoFuelType());
        gearbox.setText(this.car.getCarInfoGearboxType());
        offerPrice.setText("Cena: "+Float.toString(Common.currentUserOffer.getOfferPrice())+" zł");
    }

    private void initViews()
    {
        purchaseTxt = findViewById(R.id.purchaseDateTxt);
        returnTxt = findViewById(R.id.returnDateTxt);
        sumTxt = findViewById(R.id.sum);
        discountET = findViewById(R.id.discountET);
        brand = findViewById(R.id.offerDetailBrand);
        model = findViewById(R.id.offerDetailModel);
        productionYear = findViewById(R.id.offerDetailProductionYear);
        milleage = findViewById(R.id.offerDetailMilleage);
        capacity = findViewById(R.id.offerDetailCapacity);
        powerhorse = findViewById(R.id.offerDetailPowerhorse);
        fuelType = findViewById(R.id.offerDetailFuelType);
        gearbox = findViewById(R.id.offerDetailGearbox);
        offerPrice = findViewById(R.id.offerDetailPrice);
    }

    private void findCar(int offerID)
    {
        Car car = null;
        try
        {
            SQLiteOpenHelper helper = new DataBase(this);
            SQLiteDatabase db = helper.getReadableDatabase();
            Cursor carCursor = db.rawQuery("SELECT * FROM CARS WHERE _id =(SELECT CARID FROM OFFERS WHERE _id=?)", new String[]{String.valueOf(offerID)});
            while (carCursor.moveToNext())
            {
                car = new Car(carCursor.getString(1),
                        carCursor.getString(2),
                        carCursor.getInt(3),
                        carCursor.getFloat(4),
                        carCursor.getFloat(5),
                        carCursor.getInt(6),
                        carCursor.getString(7),
                        carCursor.getString(8),
                        carCursor.getString(9),
                        carCursor.getInt(0),
                        carCursor.getInt(10),
                        carCursor.getInt(11));
            }
            carCursor.close();
            db.close();
            this.car = car;
        }
        catch(SQLiteException e)
        {

        }
    }

    public void pickPurchaseDate(View view)
    {
        purchaseDialog = new Dialog(this);
        purchaseDialog.setContentView(R.layout.date_time_layout);
        purchaseDialog.setCancelable(true);
        Button saveDate = purchaseDialog.findViewById(R.id.pickDateButton);
        saveDate.setOnClickListener(this);
        purchase=true;
        purchaseDialog.show();
    }

    public void pickReturnDate(View view)
    {
        purchaseDialog = new Dialog(this);
        purchaseDialog.setContentView(R.layout.date_time_layout);
        purchaseDialog.setCancelable(true);
        Button saveDate = purchaseDialog.findViewById(R.id.pickDateButton);
        saveDate.setOnClickListener(this);
        purchase=false;
        purchaseDialog.show();
    }
    @Override
    public void onClick(View view)
    {
        if(purchase)
        {
            purchaseDate = getDate();
            purchaseTxt.setText(purchaseDate);
        }
        else
        {
            returnDate = getDate();
            returnTxt.setText(returnDate);
        }

        purchaseDialog.dismiss();
    }

    public void calculate(View view)
    {
        int daysCount = getCountOfDays(purchaseDate,returnDate);
        if(daysCount>0)
        {

            price = daysCount*Common.currentUserOffer.getOfferPrice();
            if(discountET.getText().length()>0)
                discount= Float.parseFloat(discountET.getText().toString());
            else
                discount = (float)0.0;
            sumTxt.setText(Float.toString(price-discount)+" zł");
        }
        else
        {
            Toast.makeText(this,"Złe daty!",Toast.LENGTH_SHORT).show();
        }
    }

    String getDate()
    {
        DatePicker datePicker = purchaseDialog.findViewById(R.id.datePicker);
        int day = datePicker.getDayOfMonth();
        int month = datePicker.getMonth();
        int year = datePicker.getYear();

        Calendar calendar = Calendar.getInstance();
        calendar.set(year,month,day);

        String date = String.format("%2s.%2s.%s",day,month+1,year);

        Toast.makeText(getApplicationContext(),"Wybrano "+date,Toast.LENGTH_LONG).show();
        purchaseDialog.dismiss();
        return date;
    }

    public void makeOrder(View view)
    {
        try
        {
            discount= Float.parseFloat(discountET.getText().toString());
            SQLiteOpenHelper helper = new DataBase(this);
            SQLiteDatabase db = helper.getWritableDatabase();

            ContentValues orderValue = new ContentValues();
            orderValue.put("DATEOFPURCHASE", purchaseDate);
            orderValue.put("DATEOFRETURN",returnDate);
            orderValue.put("PRICE", price);
            orderValue.put("DISCOUNT",discount);
            orderValue.put("CARID",car.getCarId());
            orderValue.put("CLIENTID",ClientActivity.clientID);

            ContentValues carValue = new ContentValues();
            carValue.put("ISRENTED",1);

            ContentValues offerValue = new ContentValues();
            offerValue.put("AVAILABLE",1);

            db.insert("ORDERS",null,orderValue);
            db.update("CARS",carValue,"_id=?", new String[]{Integer.toString(car.getCarId())});
            db.update("OFFERS",offerValue,"_id=?", new String[]{Integer.toString(Common.currentUserOffer.getOfferId())});
            db.close();
            Toast.makeText(this,"Dziękujemy za złożenie zamówienia",Toast.LENGTH_SHORT).show();
            finish();

        }catch(SQLiteException ex)
        {
            Toast.makeText(this,"Błąd: "+ex.toString(),Toast.LENGTH_LONG).show();
        }
    }

    //funkcja zliczająca dni
    public int getCountOfDays(String createdDateString, String expireDateString) {
        SimpleDateFormat dateFormat = new SimpleDateFormat("dd.MM.yyyy", Locale.getDefault());

        Date createdConvertedDate = null, expireCovertedDate = null, todayWithZeroTime = null;
        try {
            createdConvertedDate = dateFormat.parse(createdDateString);
            expireCovertedDate = dateFormat.parse(expireDateString);

            Date today = new Date();

            todayWithZeroTime = dateFormat.parse(dateFormat.format(today));
        } catch (ParseException e) {
            e.printStackTrace();
        }

        int cYear = 0, cMonth = 0, cDay = 0;

        if (createdConvertedDate.after(todayWithZeroTime)) {
            Calendar cCal = Calendar.getInstance();
            cCal.setTime(createdConvertedDate);
            cYear = cCal.get(Calendar.YEAR);
            cMonth = cCal.get(Calendar.MONTH);
            cDay = cCal.get(Calendar.DAY_OF_MONTH);

        } /*else {
            Calendar cCal = Calendar.getInstance();
            cCal.setTime(todayWithZeroTime);
            cYear = cCal.get(Calendar.YEAR);
            cMonth = cCal.get(Calendar.MONTH);
            cDay = cCal.get(Calendar.DAY_OF_MONTH);
        }*/

        Calendar eCal = Calendar.getInstance();
        eCal.setTime(expireCovertedDate);

        int eYear = eCal.get(Calendar.YEAR);
        int eMonth = eCal.get(Calendar.MONTH);
        int eDay = eCal.get(Calendar.DAY_OF_MONTH);

        Calendar date1 = Calendar.getInstance();
        Calendar date2 = Calendar.getInstance();

        // date1.clear();
        date1.set(cYear, cMonth, cDay);
        //date2.clear();
        date2.set(eYear, eMonth, eDay);

        long diff = eCal.getTimeInMillis() - date1.getTimeInMillis();

        float dayCount = (float) diff / (24 * 60 * 60 * 1000);

        return (int)dayCount;
    }
}
