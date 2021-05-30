import axios from 'axios';	
import {metamaskSignature} from './metamaskHelper';

const userFind=async(address)=>{
	
	try {
		let response = await axios.get('/api/users/'+address);
		if(response.data.error){
			const account = {'address':null,'name':null};
			return account;
		}else{
			const account = {'address':address,'name':response.data.payload.name};
			return account;
		}
	}catch(error){
		return error;
	}	
}


const userLogin=async(nonce,address)=>{
	try {
		let message = "You're Login One Time With Tantra Arts: "+nonce;
		let signature = await metamaskSignature(message);		
		let response = await axios.post('/api/users/',{'message':message,'signature':signature,'address':address});
		if(response.data.error){
			return JSON.parse(localStorage.getItem("userData"))
		}else{
			const account = {
				'address':response.data.payload.address,
				'name':response.data.payload.name,
				'type':response.data.payload.type,
				'token':response.data.payload.token
			};
			localStorage.setItem("userData", JSON.stringify(account));
			return account;
		}
	}catch(error){
			return error;
	}
}
const userLogout=async(token)=>{
	try {
			
			const headers = {
				'authorization' : "bearer"+token
			}

			let response = await axios.get('/api/logout',{ headers:headers});
			localStorage.setItem("userData",null);
			return response.data.payload;
	}catch(error){
			return true;
	}
}
export {userFind,userLogin,userLogout};
