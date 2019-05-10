package com.example.wiktorpieklik.car_rental.Activities;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.widget.TextView;

import com.example.wiktorpieklik.car_rental.Commons.Common;
import com.example.wiktorpieklik.car_rental.Model.Car;
import com.example.wiktorpieklik.car_rental.Model.Order;
import com.example.wiktorpieklik.car_rental.R;

public class ClientOrderDetailActivity extends AppCompatActivity
{

    public static final String orderId="XDDDDD";
    private Order order;
    private Car car;
    TextView brand, model, productionYear, milleage, capacity, fuelType, gearbox, powerhorse, dateOfPurchase, dateOfReturn, offerPrice, discountStateTxt,discountTxt;

    @Override
    protected void onCreate(Bundle savedInstanceState)
    {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_client_order_detail);

//        int orderID = (Integer)getIntent().getExtras().get(orderId);
        ///////szukanie zamówienia/////
//        for(int i = 0; i< Common.orders.size(); i++)
//        {
//            if(Common.orders.get(i).getOrderId() == orderID)
//            {
//                order = Common.orders.get(i);
//                break;
//            }
//        }
        order = Common.currentUserOrder;
        /////////szukanie auta z zamowienia/////
        for(int i=0;i<Common.cars.size();i++)
        {
            if(Common.cars.get(i).getCarId() == order.getOrderCarID())
            {
                car = Common.cars.get(i);
                break;
            }
        }
        //////////////////////////////////////////

        initViews();
        setInfo();

    }

    private void setInfo()
    {
        brand.setText(car.getCarInfoBrand());
        model.setText(car.getCarInfoModel());
        productionYear.setText(Integer.toString(car.getCarInfoProductionYear())+" rok");
        milleage.setText(Float.toString(car.getCarInfoMilleage())+" km");
        capacity.setText(Float.toString(car.getCarInfoCapacity())+"l");
        powerhorse.setText(Integer.toString(car.getCarInfoPowerHorse())+" KM");
        gearbox.setText(car.getCarInfoGearboxType());
        fuelType.setText(car.getCarInfoFuelType());
        dateOfPurchase.setText(order.getOrderDateOfPurchase());
        dateOfReturn.setText(order.getOrderDateOfReturn());
        offerPrice.setText(Float.toString(order.getOrderPrice()));
        discountTxt.setText(Float.toString(order.getOrderDiscount()));
        if(order.getDiscountGrantedState()==0)
            discountStateTxt.setText("Upust przyznany");
    }

    private void initViews()
    {
        brand = findViewById(R.id.orderDetailBrand);
        model = findViewById(R.id.orderDetailModel);
        productionYear = findViewById(R.id.orderDetailProductionYear);
        capacity = findViewById(R.id.orderDetailCapacity);
        milleage = findViewById(R.id.orderDetailMilleage);
        powerhorse = findViewById(R.id.orderDetailPowerhorse);
        gearbox = findViewById(R.id.orderDetailGearbox);
        dateOfPurchase = findViewById(R.id.orderPurchaseDate);
        dateOfReturn = findViewById(R.id.orderReturnDate);
        discountTxt = findViewById(R.id.orderDiscount);
        discountStateTxt = findViewById(R.id.orderDiscountState);
        offerPrice = findViewById(R.id.orderDetailPrice);
        fuelType = findViewById(R.id.orderDetailFuelType);
    }
}
