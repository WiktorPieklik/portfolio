package com.example.wiktorpieklik.car_rental.Model;

public class Offer
{
    private int offerId;
    private float offerPrice;
    private Car car;

    public Offer(int id, float price, Car car)
    {
        offerId=id;
        offerPrice=price;
        this.car=car;
    }

    public int getOfferId()
    {
        return this.offerId;
    }

    public float getOfferPrice()
    {
        return this.offerPrice;
    }

    String getOfferCarBrand()
    {
        return this.car.getCarInfoBrand();
    }

    String getOfferCarModel()
    {
        return this.car.getCarInfoModel();
    }

    public int getOfferCarId()
    {
        return this.car.getCarId();
    }
}
