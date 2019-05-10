package com.example.wiktorpieklik.car_rental.Commons;

import com.example.wiktorpieklik.car_rental.Model.Car;
import com.example.wiktorpieklik.car_rental.Model.Client;
import com.example.wiktorpieklik.car_rental.Model.Offer;
import com.example.wiktorpieklik.car_rental.Model.Order;

import java.util.ArrayList;
import java.util.List;

public class Common
{
    public static Offer currentUserOffer;
    public static Order currentUserOrder;
    public static List<Offer> offers = new ArrayList<>();

    //client cars
    public static List<Car> cars = new ArrayList<>();
    public static List<Order> clientOrders = new ArrayList<>();

    //owner
    public static List<Client> clients = new ArrayList<>();
    public static List<Car> carsInOffer = new ArrayList<>();
    public static List<Order> orders = new ArrayList<>();
}
