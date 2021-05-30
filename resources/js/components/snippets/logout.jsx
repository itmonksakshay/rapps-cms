import {userSignOut} from '../actions/userAction';
import {useDispatch } from 'react-redux';

function Logout({token}){
	
	const dispatch = useDispatch();
	const logoutHandle=(event,token)=>{
		event.preventDefault();
		dispatch(userSignOut(token));
	}
	
	return(<button type="button" onClick={(event)=>logoutHandle(event,token)} 
					className="text-center btn btn-outline-warning">
					Log Out
				</button>);

}
export default Logout;
