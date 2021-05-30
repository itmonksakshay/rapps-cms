import {combineReducers } from 'redux';

import userReducer from './userReducer';
import metamaskReducer from './metamaskReducer';


const rootReducer = combineReducers({
  metamask: metamaskReducer,
  user: userReducer
});

export default rootReducer;
