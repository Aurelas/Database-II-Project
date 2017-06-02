package com.example.mike.db_proj;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.kosalgeek.asynctask.PostResponseAsyncTask;

import android.view.View;
import android.widget.EditText;
import android.widget.Button;
import android.widget.TextView;

//This is this LoginActivity, This represents the backend of our login screen

public class LoginActivity extends AppCompatActivity {
    //We have our 1 login button
    Button btn;
    //two edittext fields for the username and password
    EditText UserName,PW;
    //A single textview to output any errors we might get "failed login" etc..
    TextView textView;
    //So i found out that when connecting to the database it doesnt like "localhost" or the
    //standard localhost address @ 127.0.0.1
    //So we have to use 10.0.2.2 - this is basically your localhost - no configuration required
    //connect.php is just a php script to connect to our database
    String connect_url = "http://10.0.2.2/connect.php";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        //We initialize all the objects on our LoginActivity page
        // We reference them by finding their ID that we set in the activity_main.xml file
        btn = (Button)findViewById(R.id.LoginButton);
        UserName = (EditText)findViewById(R.id.LoginUN);
        PW = (EditText)findViewById(R.id.LoginPW);
        textView = (TextView)findViewById(R.id.textView);

        //Since we are going to be clicking our button we need an onclick listener
        //If this shows up as a green box below, click the box to expand
        btn.setOnClickListener(new View.OnClickListener() {
            //To get this onclick listener to work we need to override atleast 1 abstract method
            //We use the onClick method
            @Override
            public void onClick(View v){

                //We need two things, A RequestQueue and a StringRequest
                //RequestQueue references This activity - for me it's LoginActivity

                final RequestQueue request = Volley.newRequestQueue(LoginActivity.this);
                //Sets up pretty much everything else, post method, Which url to connect to and a listener for our button
                StringRequest Srequest = new StringRequest(Request.Method.POST,connect_url,
                        new Response.Listener<String>(){
                            @Override
                            //onResponse is called after the listener returns back to use (which is onClick)
                            public void onResponse(String response){
                                //This if makes sure that the UserName is root and the password is ''
                                //By default username = 'root', pw = ''
                                if(UserName.getText().toString().equals("root") && PW.getText().toString().equals("")) {
                                    Intent nextScreen = new Intent(LoginActivity.this, HomePageActivity.class);
                                    startActivity(nextScreen);
                                }else{
                                    //if username isn't root or if the pw isn't left blank we set our text view to show this error
                                    textView.setText("Login Failed: Wrong user name or password");
                                }
                            }
                        },new Response.ErrorListener(){
                    //This is to catch more complicated errors, low level failures etc..
                    //If this message pops up you can add code after the textView.setText to print out the error
                    @Override
                    public void onErrorResponse(VolleyError error){
                        textView.setText("Something Went Wrong...");

                        //System.out.println(error);

                        request.stop();
                    }
                });
                request.add(Srequest);
            }

        });

    }
}
