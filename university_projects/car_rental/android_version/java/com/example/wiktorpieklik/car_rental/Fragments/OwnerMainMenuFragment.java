package com.example.wiktorpieklik.car_rental.Fragments;


import android.app.Activity;
import android.app.Dialog;
import android.app.FragmentTransaction;
import android.content.Intent;
import android.graphics.Color;
import android.graphics.drawable.ColorDrawable;
import android.os.Bundle;
import android.app.Fragment;
import android.support.v7.widget.CardView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;

import com.example.wiktorpieklik.car_rental.Activities.AddCarActivity;
import com.example.wiktorpieklik.car_rental.Activities.AddOfferActivity;
import com.example.wiktorpieklik.car_rental.Activities.OwnerActivity;
import com.example.wiktorpieklik.car_rental.R;


public class OwnerMainMenuFragment extends Fragment implements View.OnClickListener
{

    private Dialog dialog;
    private OwnerActivity activity;

    public OwnerMainMenuFragment()
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
        View layout = inflater.inflate(R.layout.fragment_owner_main_menu,container,false);
        CardView ordersCV = layout.findViewById(R.id.ordersCV);
        CardView offersCV = layout.findViewById(R.id.offersCV);
        CardView usersCV = layout.findViewById(R.id.usersCV);

        ordersCV.setOnClickListener(this);
        offersCV.setOnClickListener(this);
        usersCV.setOnClickListener(this);

        return layout;
    }

    @Override
    public void onClick(View view)
    {
        if(view instanceof CardView) //wywołanie funkcji kontrolek CardView
            cardViewClicked(view);
        if(view instanceof Button)   //wywołanie funkcji przycisków w popupMenu
            popupClicked(view);
    }

    public void cardViewClicked(View view)
    {
        int id = view.getId();

        switch(id)
        {
            case R.id.offersCV:
                showMenu(view);
                break;

            case R.id.ordersCV:
                activity.loadOrdersTable();
                OrderListFragment orderListFragment = new OrderListFragment();
                FragmentTransaction ft4 = getFragmentManager().beginTransaction();
                ft4.replace(R.id.mainContainer,orderListFragment);
                ft4.setTransition(FragmentTransaction.TRANSIT_FRAGMENT_FADE);
                ft4.addToBackStack(null);
                ft4.commit();
                activity.menuOn=false;
                activity.orderDetailsOn=true;
                break;

            case R.id.usersCV:
                UserListFragment fragment = new UserListFragment();
                FragmentTransaction ft = getFragmentManager().beginTransaction();
                ft.replace(R.id.mainContainer, fragment);
                ft.addToBackStack(null);
                ft.setTransition(FragmentTransaction.TRANSIT_FRAGMENT_FADE);
                ft.commit();
                activity.menuOn=false;
                break;
        }
    }

    public void popupClicked(View view)
    {
        int id = view.getId();
        switch(id)
        {
            case R.id.showOffersButton:
                OfferListFragment offerFragment = new OfferListFragment();
                FragmentTransaction ft2 = getFragmentManager().beginTransaction();
                ft2.replace(R.id.mainContainer,offerFragment);
                ft2.addToBackStack(null);
                ft2.setTransition(FragmentTransaction.TRANSIT_FRAGMENT_FADE);
                ft2.commit();
                activity.offersOn=true;
                activity.menuOn=false;
                activity.carsOn=false;
                activity.addOferOn=false;
                activity.orderDetailsOn=false;
                dialog.dismiss();
                break;

            case R.id.addOfferButton:
                Intent addOfferAct = new Intent(getActivity(), AddOfferActivity.class);
                startActivity(addOfferAct);
                activity.addOferOn=true;
                activity.menuOn=false;
                dialog.dismiss();
                break;

            case R.id.addCarButton:
                Intent addCarIntent = new Intent(getActivity(), AddCarActivity.class);
                startActivity(addCarIntent);
                dialog.dismiss();
                break;

            case R.id.showCarsButton:
                CarsListFragment fragment = new CarsListFragment();
                activity.menuOn=false;
                activity.carsOn=true;
                activity.offersOn=false;
                activity.addOferOn=false;
                activity.orderDetailsOn=false;
                FragmentTransaction ft = getFragmentManager().beginTransaction();
                ft.replace(R.id.mainContainer, fragment);
                ft.addToBackStack(null);
                ft.setTransition(FragmentTransaction.TRANSIT_FRAGMENT_FADE);
                ft.commit();
                dialog.dismiss();
                break;
        }
    }

    public void showMenu(View view)
    {
        dialog = new Dialog(view.getContext());
        dialog.setContentView(R.layout.popupmenu);

        Button showOffersBT =  dialog.findViewById(R.id.showOffersButton);
        Button showCarsBT = dialog.findViewById(R.id.showCarsButton);
        Button addOfferBT = dialog.findViewById(R.id.addOfferButton);
        Button addCarBT = dialog.findViewById(R.id.addCarButton);

        showCarsBT.setOnClickListener(this);
        showOffersBT.setOnClickListener(this);
        addOfferBT.setOnClickListener(this);
        addCarBT.setOnClickListener(this);

        dialog.setCancelable(true);
        dialog.getWindow().setBackgroundDrawable(new ColorDrawable(Color.TRANSPARENT));
        dialog.show();
    }

}
