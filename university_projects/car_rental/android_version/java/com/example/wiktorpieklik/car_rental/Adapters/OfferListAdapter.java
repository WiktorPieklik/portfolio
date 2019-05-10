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
import com.example.wiktorpieklik.car_rental.Model.Offer;
import com.example.wiktorpieklik.car_rental.R;

import java.util.List;


public class OfferListAdapter extends RecyclerView.Adapter<OfferListAdapter.ViewHolder>
{
    private Car car;
    private Listener listener;
    boolean ownerActivity;
    int loopArg;

    public static interface Listener
    {
        void itemClicked(int id);
    }

    public void setListener(Listener listener)
    {
        this.listener=listener;
    }

    public static class ViewHolder extends RecyclerView.ViewHolder
    {
        CardView cv;
        public ViewHolder(CardView cardView)
        {
            super(cardView);
            cv=cardView;
        }
    }

    public OfferListAdapter(boolean ownerActivity)
    {
        this.ownerActivity=ownerActivity;
    }

    @Override
    public OfferListAdapter.ViewHolder onCreateViewHolder(ViewGroup parent, int viewType)
    {
        CardView cardView = (CardView) LayoutInflater.from(parent.getContext()).inflate(R.layout.offer_cardview,parent,false);
        return new ViewHolder(cardView);
    }

    @Override
    public void onBindViewHolder(ViewHolder holder, final int position)
    {
        CardView cv = holder.cv;
        TextView offerName = cv.findViewById(R.id.offerName);

        ////znalezienie auta z oferty//////
        loopArg = Common.cars.size();

        for(int i=0;i<loopArg;i++)
        {
            if(ownerActivity)
            {
                if (Common.cars.get(i).getCarId() == Common.offers.get(position).getOfferCarId())
                {
                    car = Common.cars.get(i);
                    break;
                }
            }
            else
            {
                if (Common.cars.get(i).getCarId() == Common.offers.get(position).getOfferCarId())
                {
                    car = Common.cars.get(i);
                    break;
                }
            }
        }
        ///////////////////////////////////
        offerName.setText(car.getCarInfoBrand()+" "+car.getCarInfoModel());
        cv.setOnClickListener(new View.OnClickListener()
        {
            @Override
            public void onClick(View v)
            {
                if(listener!=null)
                {
                    Common.currentUserOffer = Common.offers.get(position);
                    listener.itemClicked(Common.offers.get(position).getOfferId()); //wysylamy id oferty
                }
            }
        });
    }

    @Override
    public int getItemCount()
    {
        return Common.offers.size();
    }
}
