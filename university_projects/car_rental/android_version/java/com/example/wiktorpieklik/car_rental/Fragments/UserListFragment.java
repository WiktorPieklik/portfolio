package com.example.wiktorpieklik.car_rental.Fragments;


import android.app.Activity;
import android.os.Bundle;
import android.app.Fragment;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;

import com.example.wiktorpieklik.car_rental.Activities.OwnerActivity;
import com.example.wiktorpieklik.car_rental.Adapters.UserListAdapter;
import com.example.wiktorpieklik.car_rental.R;


public class UserListFragment extends Fragment
{

    private OwnerActivity ownerActivity;

    public UserListFragment()
    {

    }


    @Override
    public void onAttach(Activity activity)
    {
        super.onAttach(activity);
        ownerActivity = (OwnerActivity)activity;
    }
    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState)
    {
        // Inflate the layout for this fragment
        View layout = inflater.inflate(R.layout.fragment_user_list,container,false);
        RecyclerView recyclerView = (RecyclerView)layout.findViewById(R.id.users_recycler);
        UserListAdapter adapter = new UserListAdapter();
        recyclerView.setAdapter(adapter);
        LinearLayoutManager layoutManager = new LinearLayoutManager(getActivity());
        recyclerView.setLayoutManager(layoutManager);
        return layout;
    }

}
