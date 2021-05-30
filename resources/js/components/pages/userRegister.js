import {useState,useEffect} from 'react';
import { useSelector, useDispatch } from 'react-redux';
import {Redirect,Link} from 'react-router-dom';
export default function UserRegister(){
	
	const dispatch = useDispatch();
	const metamask = useSelector(state => state.metamask);
	const user = useSelector(state => state.user);
		
	{!metamask.address && <Redirect to="/signin" />}
	{user.userData && <Redirect to="/"/>}	
		
		
	return(<h2>User Registration Form </h2>);

}
