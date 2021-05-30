import {useState,useEffect} from 'react';
import { useSelector, useDispatch } from 'react-redux';


function UserDashboard(){
	
		const dispatch = useDispatch();
		const metamask = useSelector(state => state.metamask);
		const user = useSelector(state => state.user);

		return(<h2>User Dashboard</h2>);
	
}
export default UserDashboard;
