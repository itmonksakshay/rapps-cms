import {useState,useEffect} from 'react';
import { useSelector, useDispatch } from 'react-redux';
import {metamaskConnection} from '../actions/metamaskAction';
import {userFetch,userSignIn} from '../actions/userAction';
import {Redirect,Link} from 'react-router-dom';


export default function UserLogin(){
	
	const dispatch = useDispatch();
	const metamask = useSelector(state => state.metamask);
	const user = useSelector(state => state.user);
	console.log(user);
	console.log(metamask);
	useEffect(() => {
		if(!metamask.address){
			dispatch(metamaskConnection());
		}
		if(metamask.address && !user.isExsist){
			dispatch(userFetch(metamask.address))
		}
	}, [metamask.address,user.isExsist]);
	
	
	const signInHandle=(event,nonce,address)=>{
		event.preventDefault();
		dispatch(userSignIn(nonce,address));
	}
	if(metamask.error) {
		 return(<div>Error! {metamask.error}</div>); 
	}
	if(metamask.isLoading ||!metamask.address || user.isLoading || !user.userData) { 
		return(<div>Loading...</div>); 
	}
	const UserAction =()=>{
		
			if(user.userData.address){
				let name = user.userData.name;
					return(<>
							<h2>Welcome Back @{name}</h2>
							<button type="button" 
								onClick={(event)=>signInHandle(event,"123",metamask.address)} 
								className="text-center btn btn-outline-warning">
									Sign In 
							</button>
						</>);
				} else {
				return(<>
					<h2 className="text-center">Switch Account <br /> OR</h2>
					<a type="button" className="text-center btn btn-outline-warning" href="/register">Sign Up</a>
				</>);
			}
		}
		
	if(user.isLoggedIn || !metamask.isAvailable){
		return(<Redirect to='/' />);
	}
	
	else {
	
		return(<div className="container">			
					<div className="row align-self-center w-100">
						<div className="col-6 mx-auto">
							<div>
								<UserAction/>
							</div>
						</div>
					</div>
				</div>);
	}

}
