package com.narij.gpslocationtest2.retrofit;


import com.narij.gpslocationtest2.WebServiceMessage;

import okhttp3.MultipartBody;
import retrofit2.Call;
import retrofit2.http.Field;
import retrofit2.http.FormUrlEncoded;
import retrofit2.http.Multipart;
import retrofit2.http.POST;
import retrofit2.http.Part;

/**
 * Created by kami on 8/4/2017.
 */

public interface APIInterface {

    @FormUrlEncoded
    @POST("saveLocation")
    Call<WebServiceMessage> saveLocation(@Field("deviceId") String deviceId, @Field("latitude") String latitude, @Field("longitude") String longitude);


}
