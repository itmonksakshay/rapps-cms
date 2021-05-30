import React,{Component} from 'react';
import Header from './sections/header';
import {connect} from 'react-redux';
import {BrowserRouter as Router,Switch,Route,Link} from 'react-router-dom';
import Home from './pages/home';
import UserLogin from './pages/userLogin';
import UserRegister from './pages/userRegister';
import UserDashboard from './pages/userDashboard';
import {metamaskAccountChange} from './helpers/metamaskHelper';
class App extends Component {
	
	constructor(props){
        super(props);
    }
    
    accountChangeEvent = (address) => {
		console.log(address);

	}
    
    componentDidMount(){
		
    window.addEventListener("metamaskAccountChange",this.accountChangeEvent);	

	}
	
	componentWillUnmount() {

	}
	
	render() {
			
		return (<Router>
					<div className="container-fluid">
						<Header/>
						<Switch>
							<Route exact path="/">
								<Home/>
							</Route>
							<Route path="/signin">
								<UserLogin/>
							</Route>
							<Route path="/dashboard">
								<UserDashboard/>
							</Route>
							<Route path="/register">
								<UserRegister/>
							</Route>
						</Switch>
					</div>
				</Router>
			);
	}
}
const mapStateToProps = (state) => {
    return {
        metamask: state.metamask,
        user: state.user
    }
}
export default connect(mapStateToProps)(App);
