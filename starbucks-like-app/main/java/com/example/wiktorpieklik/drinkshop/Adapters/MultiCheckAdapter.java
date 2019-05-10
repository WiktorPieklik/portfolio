package com.example.wiktorpieklik.drinkshop.Adapters;

import android.content.Context;
import android.support.annotation.NonNull;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.CheckBox;
import android.widget.CompoundButton;

import com.example.wiktorpieklik.drinkshop.Model.Drink;
import com.example.wiktorpieklik.drinkshop.R;
import com.example.wiktorpieklik.drinkshop.Utils.Common;

import java.util.List;

public class MultiCheckAdapter extends RecyclerView.Adapter<MultiCheckAdapter.ViewHolder>
{
    Context context;
    List<Drink> optionList;

    public MultiCheckAdapter(Context context, List<Drink> optionList)
    {
        this.context = context;
        this.optionList = optionList;
    }

    @NonNull
    @Override
    public ViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType)
    {
        View layout = LayoutInflater.from(context).inflate(R.layout.multi_check_layout, null, false);
        return new ViewHolder(layout);
    }

    @Override
    public void onBindViewHolder(@NonNull ViewHolder holder, final int position)
    {
        CheckBox checkBox = holder.checkBox;
        checkBox.setText(optionList.get(position).getName());
        checkBox.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener()
        {
            @Override
            public void onCheckedChanged(CompoundButton buttonView, boolean isChecked)
            {
                if(isChecked)
                {
                    Common.addedToppings.add(buttonView.getText().toString());
                    Common.toppingPrice += Double.parseDouble(optionList.get(position).getPrice());
                }
                else
                {
                    Common.addedToppings.remove(buttonView.getText().toString());
                    Common.toppingPrice -= Double.parseDouble(optionList.get(position).getPrice());
                }
            }
        });
    }

    @Override
    public int getItemCount()
    {
        return optionList.size();
    }

    class ViewHolder extends RecyclerView.ViewHolder
    {
        CheckBox checkBox;
        public ViewHolder(View view)
        {
            super(view);
            this.checkBox = view.findViewById(R.id.checkbox_topping);
        }
    }
}
