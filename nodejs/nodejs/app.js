const express=require('express');
const mongoose = require('mongoose');
const app = express();
const bodyParser=require('body-parser');
const cors=require('cors');
app.use(express.json());
app.use(bodyParser.json());
app.use(cors());


const connection = mongoose.connect("mongodb+srv://root:Project@cluster0.nxm6h.mongodb.net/payroll?retryWrites=true&w=majority", {
        useNewUrlParser: true,
        useCreateIndex: true,
        useFindAndModify: false,
        useUnifiedTopology: true
    });


const FeedbackSchema=mongoose.Schema({
        fname:String,
        lname:String,
        country:String,
        subject:String
});

const Feedback=mongoose.model('Feedback',FeedbackSchema);




app.post("/feedback",(req,res)=>{
	console.log(req.body);
	const newFeedback=new Feedback(req.body);
	newFeedback.save();
	res.json("succcess");
})
app.get("/feedback",async (req,res)=>{
	const feedback=await Feedback.find({});
	res.json(feedback);
})

// Setup server port
const port = process.env.PORT || 8080;
app.listen(port,()=>{
    console.log(`Server running at port ${port}`);
})