package com.example.wiktorpieklik.car_rental.Adapters;

import android.support.v7.widget.CardView;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.ViewGroup;
import android.widget.TextView;

import com.example.wiktorpieklik.car_rental.Commons.Common;
import com.example.wiktorpieklik.car_rental.Model.Client;
import com.example.wiktorpieklik.car_rental.R;

public class UserListAdapter extends RecyclerView.Adapter<UserListAdapter.ViewHolder>
{
    //private Client[] client;
   public static class ViewHolder extends RecyclerView.ViewHolder
   {
       private CardView cv;
       public ViewHolder(CardView v)
       {
           super(v);
           cv=v;
       }
   }
   public UserListAdapter()
   {

   }

   @Override
    public UserListAdapter.ViewHolder onCreateViewHolder(ViewGroup parent, int viewType)
   {
       CardView cardView = (CardView)LayoutInflater.from(parent.getContext()).inflate(R.layout.user_cardview,parent,false);
       return new ViewHolder(cardView);
   }

   @Override
    public void onBindViewHolder(ViewHolder holder, final int position)
   {
       CardView card = holder.cv;
       TextView userName = card.findViewById(R.id.userName);
       TextView userPhoneNo = card.findViewById(R.id.userPhoneNo);
       TextView userIdCard = card.findViewById(R.id.userIdCard);
       TextView userEmail = card.findViewById(R.id.userEmail);

       userName.setText(Common.clients.get(position).getClientName()+ " " + Common.clients.get(position).getClientSurname());
       userPhoneNo.setText(Common.clients.get(position).getClientPhoneNo());
       userIdCard.setText(Common.clients.get(position).getClientIdentityCard());
       userEmail.setText(Common.clients.get(position).getClientEmail());
   }

   @Override
    public int getItemCount()
   {
       return Common.clients.size();
   }
}
