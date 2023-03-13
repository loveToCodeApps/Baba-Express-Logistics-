package com.example.logistics

import android.content.Intent
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.os.Handler
import android.view.animation.AnimationUtils
import androidx.databinding.DataBindingUtil
import com.example.logistics.databinding.ActivitySplashScreenBinding

class SplashScreen : AppCompatActivity() {
lateinit var binding : ActivitySplashScreenBinding
    override fun onCreate(savedInstanceState: Bundle?) {

        super.onCreate(savedInstanceState)
binding = DataBindingUtil.setContentView(this,R.layout.activity_splash_screen)
        supportActionBar?.hide()

        val zoom_anim = AnimationUtils.loadAnimation(this,R.anim.zoom_in)
        binding.imageView.animation = zoom_anim


        Handler().postDelayed({
            startActivity(Intent(this, Home::class.java))
            finish()
        }, 2600)
    }
}


