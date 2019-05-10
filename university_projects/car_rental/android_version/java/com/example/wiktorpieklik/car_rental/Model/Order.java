package com.example.wiktorpieklik.car_rental.Model;

public class Order
{
    private int orderId;
    private int carID;
    private int clientID;
    private String dateOfPurchase;
    private String dateOfReturn;
    private float price;
    private float discount;
    private int discountGranted;

    public Order(int id, String dateOfPurchase, String dateOfReturn, float price, float discount, int discountGranted, int carID, int clientID)
    {
        orderId=id;
        this.dateOfPurchase=dateOfPurchase;
        this.dateOfReturn=dateOfReturn;
        this.price=price;
        this.discount=discount;
        this.discountGranted=discountGranted;
        this.carID=carID;
        this.clientID=clientID;
    }

    public int getOrderId()
    {
        return this.orderId;
    }

    public String getOrderDateOfPurchase()
    {
        return this.dateOfPurchase;
    }

    public String getOrderDateOfReturn()
    {
        return this.dateOfReturn;
    }

    public float getOrderPrice()
    {
        return this.price;
    }

    public float getOrderDiscount()
    {
        return this.discount;
    }

    public int getDiscountGrantedState()
    {
        return this.discountGranted;
    }

    public int getOrderClientID()
    {
        return this.clientID;
    }

    public int getOrderCarID()
    {
        return this.carID;
    }
}
