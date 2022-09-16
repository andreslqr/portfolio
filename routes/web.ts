import express from 'express';
import { homePage } from './../controllers/web/HomeController'; 

const router = express.Router();


router.get('/', homePage);


export default router;