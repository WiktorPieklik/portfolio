#include "Order.h"

Order::Order(int id, String^ dateOfPurchase, String^ dateOfReturn, float price, float discount, Boolean discountGranted, int carID, int clientID) :orderId(id), dateOfPurchase(dateOfPurchase), dateOfReturn(dateOfReturn), price(price), discount(discount), discountGranted(discountGranted), carID(carID), clientID(clientID)
{
}


int Order::getOrderId()
{
	return this->orderId;
}


String^ Order::getOrderDateOfPurchase()
{
	return this->dateOfPurchase;
}


String^ Order::getOrderDateOfReturn()
{
	return this->dateOfReturn;
}


float Order::getOrderPrice()
{
	return this->price;
}


float Order::getOrderDiscount()
{
	return this->discount;
}


Boolean Order::getDiscountGrantedState()
{
	return this->discountGranted;
}

int Order::getOrderClientID()
{
	return this->clientID;
}

int Order::getOrderCarID()
{
	return this->carID;
}