import firebase from 'firebase/app';
import 'firebase/auth';
import 'firebase/firestore';

// Import the functions you need from the SDKs you need
import { initializeApp } from "firebase/app";
// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

// Your web app's Firebase configuration
const firebaseConfig = {
  apiKey: "AIzaSyD1RLuKY0wtPHP7FQDWBrc-7Bx7OBrFNpM",
  authDomain: "go-rent-86626.firebaseapp.com",
  databaseURL: "https://go-rent-86626-default-rtdb.asia-southeast1.firebasedatabase.app",
  projectId: "go-rent-86626",
  storageBucket: "go-rent-86626.appspot.com",
  messagingSenderId: "417875943669",
  appId: "1:417875943669:web:aa7c575ee584782dcee5bc"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);
