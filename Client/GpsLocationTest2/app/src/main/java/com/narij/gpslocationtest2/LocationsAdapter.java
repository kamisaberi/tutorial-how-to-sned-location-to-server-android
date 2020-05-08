package com.narij.gpslocationtest2;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.TextView;

import java.util.ArrayList;

/**
 * Created by kami on 10/13/2017.
 */

public class LocationsAdapter extends BaseAdapter {

    public ArrayList<Location> locations = new ArrayList<>();
    public Context context;

    public LocationsAdapter(Context context) {
        this.locations = new ArrayList<>();
        this.context = context;
    }

    @Override
    public int getCount() {
        return locations.size();
    }

    @Override
    public Object getItem(int i) {
        return locations.get(i);
    }

    @Override
    public long getItemId(int i) {
        return i;
    }

    @Override
    public View getView(int i, View view, ViewGroup viewGroup) {

        ViewHolder holder;
        view = LayoutInflater.from(context).inflate(R.layout.item_location, null);
        holder = new ViewHolder();
        holder.txtLat = (TextView) view.findViewById(R.id.txtLat);
        holder.txtLong = (TextView) view.findViewById(R.id.txtLong);
        holder.txtLat.setText(locations.get(i).getLatitude() + "");
        holder.txtLong.setText(locations.get(i).getLongitude() + "");

//        if (position % 2 == 1) {
//            convertView.setBackgroundColor(context.getResources().getColor(R.color.list_row_color1));
//        } else {
//            convertView.setBackgroundColor(context.getResources().getColor(R.color.list_row_color2));
//        }

        return view;

    }


    static class ViewHolder {

        TextView txtLat;
        TextView txtLong;

    }
}
