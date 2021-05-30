import { ethers } from "ethers";

const {ethereum} = window;


const provider = new ethers.providers.Web3Provider(window.ethereum);
const signer = provider.getSigner();


const metamaskConnect = async()=>{
	try {
		let address = await ethereum.request({ method: 'eth_requestAccounts' });
		let account = address[0].toLowerCase();
		return account;
	} catch (error){
		return error;
	}
}

const metamaskSignature =async(message)=>{
		let signature = await signer.signMessage(message);
		return signature;	
}

const metamaskAccountChange =(address)=>{
			return account = address[0];
		});

}
ethereum.on('accountsChanged',metamaskAccountChange);
export {metamaskConnect,metamaskSignature,metamaskAccountChange};
