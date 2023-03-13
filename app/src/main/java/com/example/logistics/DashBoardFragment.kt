package com.example.logistics

import android.os.Bundle
import androidx.fragment.app.Fragment
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import androidx.databinding.DataBindingUtil
import com.example.logistics.databinding.FragmentDashBoardBinding

class DashBoardFragment : Fragment() {

    lateinit var binding : FragmentDashBoardBinding

    override fun onCreateView(
        inflater: LayoutInflater, container: ViewGroup?,
        savedInstanceState: Bundle?
    ): View? {
        // Inflate the layout for this fragment

   binding = DataBindingUtil.inflate(inflater,R.layout.fragment_dash_board,container,false)



        return binding.root

    }


}