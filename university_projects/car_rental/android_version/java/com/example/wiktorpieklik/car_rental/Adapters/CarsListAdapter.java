package com.example.wiktorpieklik.car_rental.Adapters;

import android.support.v7.widget.CardView;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

import com.example.wiktorpieklik.car_rental.Commons.Common;
import com.example.wiktorpieklik.car_rental.Model.Car;
import com.example.wiktorpieklik.car_rental.R;

public class CarsListAdapter extends RecyclerView.Adapter<CarsListAdapter.ViewHolder>
{
    private Listener listener;

    public class ViewHolder extends RecyclerView.ViewHolder
    {
        CardView cardView;
        public ViewHolder(CardView c)
        {
            super(c);
            cardView=c;
        }
    }

    public interface Listener
    {
         void onClick(int carId);
    }

    public void setListener(Listener listener)
    {
        this.listener=listener;
    }

    public CarsListAdapter()
    {

    }

    @Override
    public CarsListAdapter.ViewHolder onCreateViewHolder(ViewGroup parent, int viewType)
    {
        CardView cv = (CardView) LayoutInflater.from(parent.getContext()).inflate(R.layout.car_cardview, parent, false);
        return new ViewHolder(cv);
    }

    @Override
    public void onBindViewHolder(ViewHolder holder, final int position)
    {
        CardView cardView = holder.cardView;
        TextView name = cardView.findViewById(R.id.carName);
        name.setText(Common.cars.get(position).getCarInfoBrand()+" "+ Common.cars.get(position).getCarInfoModel());
        cardView.setOnClickListener(new View.OnClickListener()
        {
            @Override
            public void onClick(View v)
            {
                if(listener!=null)
                {
                    listener.onClick(Common.cars.get(position).getCarId()); //dostajemy id kiknietego auta
                }
            }
        });
    }

    @Override
    public int getItemCount()
    {
        return Common.cars.size();
    }

}
