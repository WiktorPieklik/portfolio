package com.example.wiktorpieklik.car_rental.Fragments;


import android.content.Intent;
import android.os.Bundle;
import android.app.Fragment;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;

import com.example.wiktorpieklik.car_rental.Activities.OfferDetailsActivity;
import com.example.wiktorpieklik.car_rental.Activities.OwnerActivity;
import com.example.wiktorpieklik.car_rental.Adapters.OfferListAdapter;
import com.example.wiktorpieklik.car_rental.R;


/**
 * A simple {@link Fragment} subclass.
 */
public class OfferListFragment extends Fragment
{


    public OfferListFragment()
    {
        // Required empty public constructor
    }


    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState)
    {
        // Inflate the layout for this fragment
        View layout = inflater.inflate(R.layout.fragment_offer_list,container,false);
        RecyclerView recyclerView = layout.findViewById(R.id.offersRecycler);
        OfferListAdapter adapter = new OfferListAdapter(true);
        recyclerView.setAdapter(adapter);
        LinearLayoutManager layoutManager = new LinearLayoutManager(getActivity());
        recyclerView.setLayoutManager(layoutManager);
        adapter.setListener(new OfferListAdapter.Listener()
        {
            @Override
            public void itemClicked(int id)
            {
                Intent offerDetails = new Intent(getActivity(), OfferDetailsActivity.class);
                offerDetails.putExtra(OfferDetailsActivity.offerID, id);
                startActivity(offerDetails);
            }
        });
        return layout;
    }

}
