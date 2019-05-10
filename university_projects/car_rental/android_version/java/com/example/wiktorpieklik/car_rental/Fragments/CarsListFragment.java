package com.example.wiktorpieklik.car_rental.Fragments;


import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.app.Fragment;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;

import com.example.wiktorpieklik.car_rental.Activities.CarDetailsActivity;
import com.example.wiktorpieklik.car_rental.Activities.OwnerActivity;
import com.example.wiktorpieklik.car_rental.Adapters.CarsListAdapter;
import com.example.wiktorpieklik.car_rental.Commons.Common;
import com.example.wiktorpieklik.car_rental.R;

import java.util.Calendar;


public class CarsListFragment extends Fragment
{
    private OwnerActivity activity;

    public CarsListFragment()
    {
        // Required empty public constructor
    }

    @Override
    public void onAttach(Activity activity)
    {
        super.onAttach(activity);
        this.activity=(OwnerActivity)activity;
    }

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState)
    {
        // Inflate the layout for this fragment
        View layout = inflater.inflate(R.layout.fragment_cars_list, container, false);
        RecyclerView recyclerView = layout.findViewById(R.id.carsRecycler);
        CarsListAdapter adapter = new CarsListAdapter();
        LinearLayoutManager layoutManager = new LinearLayoutManager(getActivity());
        adapter.setListener(new CarsListAdapter.Listener()
        {
            @Override
            public void onClick(int id)
            {
                Intent carDetails = new Intent(getActivity(), CarDetailsActivity.class);
                carDetails.putExtra(CarDetailsActivity.carID, id);
                startActivity(carDetails);
            }
        });
        recyclerView.setLayoutManager(layoutManager);
        recyclerView.setAdapter(adapter);
        return  layout;
    }

}
