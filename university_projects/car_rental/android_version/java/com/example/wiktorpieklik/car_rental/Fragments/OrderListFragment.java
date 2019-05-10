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

import com.example.wiktorpieklik.car_rental.Activities.OrderDetailsActivity;
import com.example.wiktorpieklik.car_rental.Activities.OwnerActivity;
import com.example.wiktorpieklik.car_rental.Adapters.OrderListAdapter;
import com.example.wiktorpieklik.car_rental.Commons.Common;
import com.example.wiktorpieklik.car_rental.R;


/**
 * A simple {@link Fragment} subclass.
 */
public class OrderListFragment extends Fragment
{

    private OwnerActivity activity;

    public OrderListFragment()
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
        View layout = inflater.inflate(R.layout.fragment_order_list,container,false);
        RecyclerView recyclerView = layout.findViewById(R.id.ordersRecycler);
        OrderListAdapter adapter = new OrderListAdapter(Common.orders,true);
        LinearLayoutManager layoutManager = new LinearLayoutManager(getActivity());
        recyclerView.setLayoutManager(layoutManager);
        adapter.setListener(new OrderListAdapter.Listener()
        {
            @Override
            public void itemClicked(int id)
            {
                Intent intent = new Intent(getActivity(), OrderDetailsActivity.class);
                intent.putExtra(OrderDetailsActivity.orderId,id);
                startActivity(intent);
            }
        });
        recyclerView.setAdapter(adapter);
        return layout;
    }

}
