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
const initialState ={
						isLoading:false,
						userData:null,
						error:null,
						isExsist:false,
						isLoggedIn:false
					};

const userReducer = (state = initialState, action) => {
	if(action.type == USER_FIND_SUCCESS){
		localStorage.setItem("userData", JSON.stringify(action.payload));
	}
	let status = false;
	if(action.type == USER_CONNECT_SUCCESS){
		status=(action.payload.token)?true:false;
	}
  switch(action.type) {
	case USER_FIND :
		return {'isLoading':true,'userData':null,'error':null,'isLoggedIn':false,'isExsist':false}
	case USER_FIND_SUCCESS:
		return {'isLoading':false,'userData':action.payload,'error':null,'isLoggedIn':false,'isExsist':true}
	case USER_FIND_FAILURE:
		return {'isLoading':false,'userData':null,'error':action.payload,'isLoggedIn':false,'isExsist':false}
    case USER_CONNECT : 
		return {'isLoading':true,'userData':JSON.parse(localStorage.getItem("userData")),'error':null,'isLoggedIn':false,'isExsist':true}
    case USER_CONNECT_SUCCESS : 
		return {'isLoading':false,'userData':action.payload,'error':null,'isLoggedIn':status,'isExsist':true}
    case USER_CONNECT_FAILURE : 
		return {'isLoading':false,'userData':JSON.parse(localStorage.getItem("userData")),'error':action.payload,'isLoggedIn':false,'isExsist':true}
    case USER_LOGOUT : 
		return {'isLoading':true,'userData':JSON.parse(localStorage.getItem("userData")),'error':null,'isLoggedIn':true,'isExsist':true}
    case USER_LOGOUT_SUCCESS : 
		return {'isLoading':false,'userData':action.payload,'error':null,'isLoggedIn':false,'isExsist':false}
    case USER_LOGOUT_FAILURE : 
		return {'isLoading':false,'userData':JSON.parse(localStorage.getItem("userData")),'error':action.payload,'isLoggedIn':true,'isExsist':true}
    
    default:
		return state;
  }
}
export default userReducer;
