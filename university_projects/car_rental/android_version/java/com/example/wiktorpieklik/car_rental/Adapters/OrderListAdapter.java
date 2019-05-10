package com.example.wiktorpieklik.car_rental.Adapters;

import android.support.v7.widget.CardView;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

import com.example.wiktorpieklik.car_rental.Activities.ClientActivity;
import com.example.wiktorpieklik.car_rental.Activities.OwnerActivity;
import com.example.wiktorpieklik.car_rental.Commons.Common;
import com.example.wiktorpieklik.car_rental.Model.Car;
import com.example.wiktorpieklik.car_rental.Model.Order;
import com.example.wiktorpieklik.car_rental.R;

import java.util.List;

public class OrderListAdapter extends RecyclerView.Adapter<OrderListAdapter.ViewHolder>
{
    private List<Order> orders;
    private Car car;
    private Listener listener;
    boolean owneActivity=true;

    public static class ViewHolder extends RecyclerView.ViewHolder
    {
        CardView cv;
        public ViewHolder(CardView cardView)
        {
            super(cardView);
            cv=cardView;
        }
    }

    public OrderListAdapter(List<Order> orders, boolean owneActivity)
    {
        this.orders=orders;
        this.owneActivity=owneActivity;
    }

    public static interface Listener
    {
        void itemClicked(int id);
    }

    public void setListener(Listener listener)
    {
        this.listener=listener;
    }

    @Override
    public OrderListAdapter.ViewHolder onCreateViewHolder(ViewGroup parent, int viewType)
    {
        CardView cardView = (CardView) LayoutInflater.from(parent.getContext()).inflate(R.layout.order_cardview,parent,false);
        return new ViewHolder(cardView);
    }

    @Override
    public void onBindViewHolder(ViewHolder holder, final int position)
    {
        CardView cv = holder.cv;
        TextView name = cv.findViewById(R.id.orderName);

        /////szukanie auta z zamówienia/////////
        for(int i = 0; i< Common.cars.size(); i++)
        {
            if(owneActivity)
            {
                if (Common.cars.get(i).getCarId() == orders.get(position).getOrderCarID())
                {
                    car = Common.cars.get(i);
                    break;
                }
            }
            else
            {
                if (Common.cars.get(i).getCarId() == orders.get(position).getOrderCarID())
                {
                    car = Common.cars.get(i);
                    break;
                }
            }
        }
        /////////////////////////////////////////

        name.setText(car.getCarInfoBrand()+" "+ car.getCarInfoModel());
        cv.setOnClickListener(new View.OnClickListener()
        {
            @Override
            public void onClick(View v)
            {
                if(listener!=null)
                {
                    Common.currentUserOrder = orders.get(position);
                    listener.itemClicked(orders.get(position).getOrderId());///przekazujemy id zamowienia w funkcji/////
                }
            }
        });

    }

    @Override
    public int getItemCount()
    {
        return orders.size();
    }
}
