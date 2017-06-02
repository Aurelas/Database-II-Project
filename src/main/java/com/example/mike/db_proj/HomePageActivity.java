package com.example.mike.db_proj;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;


import android.view.View;
import android.widget.EditText;
import android.widget.Button;
import android.widget.TextView;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import java.util.*;

//This is our HomePageActivity, Where all our Queries will be
//HOW IT WORKS
/*
    I have 3 buttons that call 3 different queries, queries 2 and 3 need input which i sent to it via
    an Edittext box, 2 and 3 share the same box.

    Query 1 doesn't need any input and you can just click it.
 */
public class HomePageActivity extends AppCompatActivity {
    /*
    Three buttons, 1 edittext and a textview will appear on our user interface.
    The Three strings are our php queries, the reason why they are "modified" is because
    android app will display anything that is Echo'd in php, so we must convert to printfs
     */
    Button btn1;
    Button btn2;
    Button btn3;
    Button btn4;
    EditText input2;
    TextView output;

    String Q1_url = "http://10.0.2.2/Modified1.php";
    String Q2_url = "http://10.0.2.2/Modified2.php";
    String Q3_url = "http://10.0.2.2/Modified3.php";
    String Q4_url = "http://10.0.2.2/Modified4.php";


    public static final String USER_INPUT2 = "input2";
    public static final String USER_INPUT3 = "input3";
    public static final String USER_INPUT4 = "input4";
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_home_page);
        //initialize all objects on our Homepageinterface
        btn1 = (Button)findViewById(R.id.Button1);
        btn2 = (Button)findViewById(R.id.Button2);
        btn3 = (Button)findViewById(R.id.button3);
        btn4 = (Button)findViewById(R.id.Button4);
        input2 = (EditText)findViewById(R.id.InputText);
        output = (TextView)findViewById(R.id.OutputView);

        //set our onclick listener for button 1, This requires no input so it will look a lot like our login button
        btn1.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v){

                final RequestQueue request = Volley.newRequestQueue(HomePageActivity.this);
                StringRequest Srequest = new StringRequest(Request.Method.POST,Q1_url,
                        new Response.Listener<String>(){
                            @Override
                            public void onResponse(String response){
                                output.setText(response);
                            }
                        },new Response.ErrorListener(){
                    @Override
                    public void onErrorResponse(VolleyError error){
                        output.setText("Something Went Wrong...");


                        request.stop();
                    }

                });
                request.add(Srequest);


            }
        });

        //Create an onclick listener for button 2, THIS DOES NEED INPUT
        btn2.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v){
                //take input from our edittext field
                final String input = input2.getText().toString().trim();
                final RequestQueue request = Volley.newRequestQueue(HomePageActivity.this);
                StringRequest Srequest = new StringRequest(Request.Method.POST,Q2_url,
                        new Response.Listener<String>(){
                            @Override
                            public void onResponse(String response){
                                output.setText(response);
                            }
                        },new Response.ErrorListener(){
                    @Override
                    public void onErrorResponse(VolleyError error){
                        output.setText("Something Went Wrong...");


                        request.stop();
                    }
                }){
                    //Because we need input we need to map the data that we want to send to the php code
                    @Override
                    protected Map<String,String> getParams(){
                        Map<String,String> params = new HashMap<String, String>();
                        params.put(USER_INPUT2,input);

                        return params;
                    }

            };
            request.add(Srequest);


        };
    });

        //Same as button two but with a different url in the string request
        btn3.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v){
                final String input = input2.getText().toString().trim();
                final RequestQueue request = Volley.newRequestQueue(HomePageActivity.this);
                StringRequest Srequest = new StringRequest(Request.Method.POST,Q3_url,
                        new Response.Listener<String>(){
                            @Override
                            public void onResponse(String response){
                                output.setText(response);
                            }
                        },new Response.ErrorListener(){
                    @Override
                    public void onErrorResponse(VolleyError error){
                        output.setText("Something Went Wrong...");


                        request.stop();
                    }
                }){
                    @Override
                    protected Map<String,String> getParams(){
                        Map<String,String> params = new HashMap<String, String>();
                        params.put(USER_INPUT3,input);

                        return params;
                    }

                };
                request.add(Srequest);


            };
        });

        btn4.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v){
                //take input from our edittext field
                final String input = input2.getText().toString().trim();
                final RequestQueue request = Volley.newRequestQueue(HomePageActivity.this);
                StringRequest Srequest = new StringRequest(Request.Method.POST,Q4_url,
                        new Response.Listener<String>(){
                            @Override
                            public void onResponse(String response){
                                output.setText(response);
                            }
                        },new Response.ErrorListener(){
                    @Override
                    public void onErrorResponse(VolleyError error){
                        output.setText("Something Went Wrong...");


                        request.stop();
                    }
                }){
                    //Because we need input we need to map the data that we want to send to the php code
                    @Override
                    protected Map<String,String> getParams(){
                        Map<String,String> params = new HashMap<String, String>();
                        params.put(USER_INPUT4,input);

                        return params;
                    }

                };
                request.add(Srequest);


            };
        });
}

}

