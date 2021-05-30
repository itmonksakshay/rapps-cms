import { applyMiddleware, compose, createStore } from 'redux';
import thunk from 'redux-thunk';
import ReactDOM from 'react-dom';
import { Provider } from 'react-redux';
import App from './app';
import rootReducer from './reducers/rootReducer';

const isMetaMaskInstalled = () => {
    return Boolean(window.ethereum && window.ethereum.isMetaMask);
};

const user = JSON.parse(localStorage.getItem("userData"));
let userState = {'isLoading':false,'userData':null,'error':null,'isLoggedIn':false,'isExsist':false};
let metamaskState = {'isAvailable':isMetaMaskInstalled(),'address':null,'signature':null,'isLoading':false,'error':null};

if(user){
	if(user.token){
		userState = {'isLoading':false,'userData':user,'error':null,'isLoggedIn':true,'isExsist':true}
	}else if(user.address){
		userState = {'isLoading':false,'userData':user,'error':null,'isLoggedIn':false,'isExsist':true}	
	}else {
		userState = {'isLoading':false,'userData':user,'error':null,'isLoggedIn':false,'isExsist':false}			
	}
}

const initialState = { 
  metamask:metamaskState,
  user:userState
};
const store = createStore(rootReducer,initialState,applyMiddleware(thunk));

if (document.getElementById('root')) {
    ReactDOM.render(<Provider store={store}>
						<App />
					</Provider>, document.getElementById('root'));
}
