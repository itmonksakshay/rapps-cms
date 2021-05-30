import {METAMASK_CONNECT,METAMASK_CONNECT_SUCCESS,METAMASK_CONNECT_FAILURE} from '../constants/metamaskConstants';
import {metamaskConnect} from '../helpers/metamaskHelper';

const metamaskConnection =()=>async(dispatch)=>{
	
	    dispatch({ type:METAMASK_CONNECT});
	    metamaskConnect()
	    .then(data=>dispatch({type:METAMASK_CONNECT_SUCCESS,payload:data}))
	    .catch(err =>dispatch({type:METAMASK_CONNECT_FAILURE,payload:err}));	
}


export {metamaskConnection};
