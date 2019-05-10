#pragma once
#ifndef Order_h
#define Order_h

using namespace System;
using namespace System::Windows::Forms;
ref class Order
{
public:
	Order(int id, String^ dateOfPurchase, String^ dateOfReturn, float price, float discount, Boolean discountGranted, int carID, int clientID);
	int getOrderId();
	String^ getOrderDateOfPurchase();
	String^ getOrderDateOfReturn();
	float getOrderPrice();
	float getOrderDiscount();
	Boolean getDiscountGrantedState();
	int getOrderCarID();
	int getOrderClientID();
	

private:
	int orderId;
	int carID;
	int clientID;
	String^ dateOfPurchase;
	String^ dateOfReturn;
	float price;
	float discount;
	Boolean discountGranted;
};

#endif