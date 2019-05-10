package com.example.wiktorpieklik.car_rental.Fragments;


import android.app.FragmentTransaction;
import android.content.Intent;
import android.os.Bundle;
import android.app.Fragment;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;

import com.example.wiktorpieklik.car_rental.Activities.ClientActivity;
import com.example.wiktorpieklik.car_rental.Activities.ClientOrderDetailActivity;
import com.example.wiktorpieklik.car_rental.Adapters.OrderListAdapter;
import com.example.wiktorpieklik.car_rental.Commons.Common;
import com.example.wiktorpieklik.car_rental.R;


/**
 * A simple {@link Fragment} subclass.
 */
public class ClientOrdersListFragment extends Fragment
{


    public ClientOrdersListFragment()
    {
        // Required empty public constructor
    }


    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState)
    {
        // Inflate the layout for this fragment
        View layout = inflater.inflate(R.layout.fragment_client_orders_list, container, false);
        RecyclerView recyclerView = layout.findViewById(R.id.clientOrdersRecycler);
        OrderListAdapter adapter = new OrderListAdapter(Common.clientOrders,false);
        LinearLayoutManager layoutManager = new LinearLayoutManager(getActivity());
        recyclerView.setLayoutManager(layoutManager);
        adapter.setListener(new OrderListAdapter.Listener()
        {
            @Override
            public void itemClicked(int id)
            {
                Intent orderIntent = new Intent(getActivity(), ClientOrderDetailActivity.class);
                //orderIntent.putExtra(ClientOrderDetailActivity.orderId, id);
                startActivity(orderIntent);
            }
        });
        recyclerView.setAdapter(adapter);
        return layout;
    }

    @Override
    public void onDestroy()
    {
        super.onDestroy();
        ClientActivity.otherFragment=false;
    }

    @Override
    public void onPause()
    {
        super.onPause();
        ClientActivity.otherFragment=false;
        FragmentTransaction ft = getFragmentManager().beginTransaction();
        ft.remove(this).commit();
    }

}
