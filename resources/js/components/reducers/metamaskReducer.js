import {METAMASK_CONNECT,METAMASK_CONNECT_SUCCESS,METAMASK_CONNECT_FAILURE} from '../constants/metamaskConstants';

const initialState = {isAvailable:true,address:null,error:null,isLoading:false};

const metamaskReducer = (state = initialState, action) => {

  switch(action.type){
    case METAMASK_CONNECT:
      return {isAvailable:true,address:null,error:null,isLoading:true};
    case METAMASK_CONNECT_SUCCESS:
		return {isAvailable:true,address:action.payload,error:null,isLoading:false};
	case METAMASK_CONNECT_FAILURE:
		return {isAvailable:true,address:null,error:action.payload,isLoading:false};
    default:
      return state;
  }
}
export default metamaskReducer;
