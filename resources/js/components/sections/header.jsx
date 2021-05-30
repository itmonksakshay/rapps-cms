import {Link,useLocation} from 'react-router-dom';
import { useSelector} from 'react-redux';
import Logout from '../snippets/logout';

export default function Header(){
	const location = useLocation();
	const metamask = useSelector(state => state.metamask);
	const user = useSelector(state => state.user);
	const routes =['/signin','/register'];
	const UserAction =()=>{
		if(user.isLoggedIn){
			return(<>
				<li className="nav-item active mr-1 active">
					<Link to="/dashboard" className="text-center btn btn-outline-warning">Dashboard</Link>
				</li>
				<li className="nav-item">
					<Logout token={user.userData.token} />
				</li>
			</>);
		}
		if(metamask.isAvailable){
			return(<li className="nav-item active mr-1 active">
				<Link to="/signin" className="text-center btn btn-outline-warning" disabled={routes.includes(location.pathname)}>Enable Ethereum</Link>
			</li>);
		}else{
			return(<li className="nav-item active mr-1 active">
				<Link to="#" className="text-center btn btn-outline-warning">Install Metamask</Link>
			</li>);
		}	
		
	}
	
	return(
		<header className="row">
			<nav className="navbar navbar-expand-lg navbar-dark bg-dark w-100">
				<a className="navbar-brand" href="#">Navbar</a>
				<button className="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span className="navbar-toggler-icon"></span>
				</button>
	
				<div className="collapse navbar-collapse" id="navbarSupportedContent">
					<div className="col-4">
						<ul className="navbar-nav mr-auto">
						  <li className="nav-item active">
							<a className="nav-link" href="#">Home <span className="sr-only">(current)</span></a>
						  </li>
						  <li className="nav-item">
							<a className="nav-link" href="#">Link</a>
						  </li>
						  <li className="nav-item dropdown">
							<a className="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							  Dropdown
							</a>
							<div className="dropdown-menu" aria-labelledby="navbarDropdown">
							  <a className="dropdown-item" href="#">Action</a>
							  <a className="dropdown-item" href="#">Another action</a>
							  <div className="dropdown-divider"></div>
							  <a className="dropdown-item" href="#">Something else here</a>
							</div>
						  </li>
						  <li className="nav-item">
							<a className="nav-link disabled" href="#">Disabled</a>
						  </li>
						</ul>
					</div>
					<div className="col-4">
						<form className="form-inline my-2 my-lg-0">
							<input className="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"/>
							<button className="btn btn-outline-warning my-2 my-sm-0" type="submit">Search</button>
						</form>
					</div>
					<div className="col-4">
						<ul className="navbar-nav mr-auto justify-content-end">
							<UserAction/>
						</ul>
					</div>
				</div>
			</nav>
		</header>);
	

}
