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
import com.example.wiktorpieklik.car_rental.Activities.ClientOfferDetailActivity;
import com.example.wiktorpieklik.car_rental.Adapters.OfferListAdapter;
import com.example.wiktorpieklik.car_rental.R;


/**
 * A simple {@link Fragment} subclass.
 */
public class ClientOfferListFragment extends Fragment
{

    /*private ClientActivity activity;

    public ClientOfferListFragment()
    {
        // Required empty public constructor
    }

    @Override
    public void onAttach(Activity activity)
    {
        super.onAttach(activity);
        activity=(ClientActivity)activity;
    }*/

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState)
    {
        // Inflate the layout for this fragment
        View layout = inflater.inflate(R.layout.fragment_client_offer_list, container, false);
        RecyclerView recyclerView = layout.findViewById(R.id.clientOffersRecycler);
        OfferListAdapter adapter = new OfferListAdapter(false);
        LinearLayoutManager layoutManager = new LinearLayoutManager(getActivity());
        recyclerView.setLayoutManager(layoutManager);
        adapter.setListener(new OfferListAdapter.Listener()
        {
            @Override
            public void itemClicked(int id)
            {
                Intent details = new Intent(getActivity(), ClientOfferDetailActivity.class);
                //details.putExtra(ClientOfferDetailActivity.offerId,id);
                startActivity(details);
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
