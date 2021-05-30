import {USER_FIND,
		USER_FIND_SUCCESS,
		USER_FIND_FAILURE,
		USER_CONNECT,
		USER_CONNECT_FAILURE,
		USER_CONNECT_SUCCESS,
		USER_LOGOUT,
		USER_LOGOUT_SUCCESS,
		USER_LOGOUT_FAILURE
	} from '../constants/userConstants';
import {userFind,userLogin,userLogout} from '../helpers/userHelper';

const userFetch =(address)=>async(dispatch)=>{
	dispatch({type:USER_FIND});
	userFind(address)
	.then(data=>dispatch({type:USER_FIND_SUCCESS,payload:data}))
	.catch(err=>dispatch({type:USER_FIND_FAILURE,payload:err}));
	
}


const userSignIn =(nonce,address)=>async(dispatch)=>{
	dispatch({type:USER_CONNECT});
	userLogin(nonce,address)
	.then(data=>dispatch({type:USER_CONNECT_SUCCESS,payload:data}))
	.catch(err=>dispatch({type:USER_CONNECT_FAILURE,payload:err}));
	
}
const userSignOut =(token)=>async(dispatch)=>{
	
	dispatch({type:USER_LOGOUT});
	userLogout(token)
	.then(data=>dispatch({type:USER_LOGOUT_SUCCESS,payload:data}))
	.catch(err=>dispatch({type:USER_LOGOUT_FAILURE,payload:err}));
	
}

export {userFetch,userSignIn,userSignOut};
