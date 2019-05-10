package com.example.wiktorpieklik.drinkshop.Retrofit;

import com.example.wiktorpieklik.drinkshop.Model.Banner;
import com.example.wiktorpieklik.drinkshop.Model.Category;
import com.example.wiktorpieklik.drinkshop.Model.CheckUserResponse;
import com.example.wiktorpieklik.drinkshop.Model.Drink;
import com.example.wiktorpieklik.drinkshop.Model.User;

import java.util.List;

import io.reactivex.Observable;
import okhttp3.MultipartBody;
import retrofit2.Call;
import retrofit2.http.Field;
import retrofit2.http.FormUrlEncoded;
import retrofit2.http.GET;
import retrofit2.http.Multipart;
import retrofit2.http.POST;
import retrofit2.http.Part;

public interface IDrinkShopAPI
{
    @FormUrlEncoded
    @POST("checkuser.php")
    Call<CheckUserResponse> checkUserExists(@Field("phone") String phone);

    @FormUrlEncoded
    @POST("registeruser.php")
    Call<User> registerUser(@Field("phone") String phone,
                            @Field("name") String name,
                            @Field("birthdate") String birthdate,
                            @Field("address") String address);

    @FormUrlEncoded
    @POST("getuser.php")
    Call<User> getUser(@Field("phone") String phone);

    @GET("getbanner.php")
    Observable<List<Banner>> getBanners();

    @GET("getmenu.php")
    Observable<List<Category>> getMenus();

    @FormUrlEncoded
    @POST("getdrinks.php")
    Observable<List<Drink>> getDrinks(@Field("menuId") String menuId);


    @Multipart
    @POST("upload.php")
    Call<String> uploadFile(@Part MultipartBody.Part phone, @Part MultipartBody.Part file);



}
