package com.example.wiktorpieklik.car_rental;

import android.content.ContentValues;
import android.content.Context;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;

public class DataBase extends SQLiteOpenHelper
{
    private static final String DB_NAME="wypozyczalnia";
    private static final int DB_VERSION=1;
    public DataBase(Context context)
    {
        super(context, DB_NAME, null, DB_VERSION);
    }

    @Override
    public void onCreate(SQLiteDatabase db)
    {
        db.execSQL("CREATE TABLE CLIENTS (_id INTEGER PRIMARY KEY AUTOINCREMENT, " //tabela klientow
                + "NAME TEXT NOT NULL, "
                +"SURNAME TEXT NOT NULL, "
                +"PHONENO TEXT NOT NULL, "
                +"IDCARD TEXT NOT NULL, "
                + "LOGIN TEXT NOT NULL, "
                +"PASSWORD TEXT NOT NULL, "
                +"EMAIL TEXT NOT NULL );");

        db.execSQL("CREATE TABLE CARS (_id INTEGER PRIMARY KEY AUTOINCREMENT, " //tabela aut
                +"BRAND TEXT NOT NULL, "
                +"MODEL TEXT NOT NULL, "
                +"PRODUCTIONYEAR INTEGER NOT NULL, "
                +"MILLEAGE REAL NOT NULL, "
                +"CAPACITY REAL NOT NULL, "
                +"POWERHORSE INTEGER NOT NULL, "
                +"FUELTYPE TEXT NOT NULL, "
                +"GEARBOXTYPE TEXT NOT NULL, "
                +"NUMBERPLATE TEXT NOT NULL, "
                +"ISRENTED INTEGER NOT NULL, "
                +"INOFFER INTEGER NOT NULL);");

        db.execSQL("CREATE TABLE OFFERS (_id INTEGER PRIMARY KEY AUTOINCREMENT, "
                +"CARID INTEGER, "
                +"OFFERPRICE FLOAT, "
                +"AVAILABLE INTEGER);");

        db.execSQL("CREATE TABLE ORDERS (_id INTEGER PRIMARY KEY AUTOINCREMENT, "
        +"DATEOFPURCHASE STRING, "
        +"DATEOFRETURN STRING, "
        +"PRICE FLOAT, "
        +"DISCOUNT FLOAT, "
        +"DISCOUNTGRANTED INTEGER DEFAULT 1, "
        +"CARID INTEGER, "
        +"CLIENTID INTEGER);");

        ////poczatkowe wypelnienie bazy danymi///////////
        inserClient(db, " ", " "," "," ","admin","admin"," ");
        inserClient(db,"Wiktor","Pieklik","1234567","hcv66712","wygryw667","wygryw667","wiktor.pieklik@icloud.com");
        inserClient(db,"Adam","Nowak","09876543221","ajhg12bn","adam","adam","adam.nowak@gmail.com");

        inserCar(db,"Toyota","Corolla",2016,(float)30205,(float)1.6,130, "benzyna","manualna","ABCD12345",0,1);
        inserCar(db,"Lexus","GS450h",2016,(float)300000,(float)3.5,350,"benzyna","automatyczna","WI1234",0,0);
        inserCar(db,"Alfa Romeo","TS",1998,(float)120000,(float)1.6,120,"benzyna","manualna","PN12345",0,1);
        inserCar(db,"Ford","Mustang",2017,(float)30,(float)5.5,550,"benzyna","automatyczna","POMUSTANG",0,0);
        inserCar(db,"Aston Martin","DB9",2017,(float)1500,(float)4.5,470,"benzyna","automatyczna","WIASTON",0,0);
        inserCar(db,"Mercedes","SLS",2018,(float)5,(float)5.5,650,"benzyna","automatyczna","POMERC",0,1);

        insertOffer(db,1,(float)250.5,0);
        insertOffer(db,6,(float)500.75,0);
        insertOffer(db,3,(float)932.23,0);
    }

    @Override
    public void onUpgrade(SQLiteDatabase db, int oldVersion, int newVersion)
    {

    }

    private void inserClient(SQLiteDatabase db, String name, String surname, String phoneNo, String idCard, String login, String password, String email)
    {
        ContentValues clientValues = new ContentValues();
        clientValues.put("NAME", name);
        clientValues.put("SURNAME", surname);
        clientValues.put("PHONENO", phoneNo);
        clientValues.put("IDCARD", idCard);
        clientValues.put("LOGIN", login);
        clientValues.put("PASSWORD", password);
        clientValues.put("EMAIL", email);
        db.insert("CLIENTS",null, clientValues);
    }

    private void inserCar(SQLiteDatabase db, String brand, String model, int productionYear,float milleage, float capacity, int powerhorse, String fuelType, String gearboxType, String numberPlate, int isRented, int inOffer)
    {
        ContentValues carValues = new ContentValues();
        carValues.put("BRAND", brand);
        carValues.put("MODEL",model);
        carValues.put("PRODUCTIONYEAR", productionYear);
        carValues.put("MILLEAGE",milleage);
        carValues.put("CAPACITY",capacity);
        carValues.put("POWERHORSE",powerhorse);
        carValues.put("FUELTYPE",fuelType);
        carValues.put("GEARBOXTYPE",gearboxType);
        carValues.put("NUMBERPLATE",numberPlate);
        carValues.put("ISRENTED",isRented);
        carValues.put("INOFFER", inOffer);
        db.insert("CARS",null,carValues);
    }

    private void insertOffer(SQLiteDatabase db, int carID, float offerPrice, int available)
    {
        ContentValues offerValues = new ContentValues();
        offerValues.put("CARID",carID);
        offerValues.put("OFFERPRICE",offerPrice);
        offerValues.put("AVAILABLE", available);
        db.insert("OFFERS", null,offerValues);
    }

    private void insertOrder(SQLiteDatabase db, String dateOfPurchase, String dateOfReturn, float price, float discount, int discountGranted, int carID, int clientID)
    {
        ContentValues orderValue = new ContentValues();
        orderValue.put("DATEOFPURCHASE",dateOfPurchase);
        orderValue.put("DATEOFRETURN",dateOfReturn);
        orderValue.put("PRICE",price);
        orderValue.put("DISCOUNT",discount);
        orderValue.put("DISCOUNTGRANTED",discountGranted);
        orderValue.put("CARID",carID);
        orderValue.put("CLIENTID",clientID);
        db.insert("ORDERS",null,orderValue);
    }
}
